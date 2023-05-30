<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\MyMatchRepository;
use App\Repository\SkillRepository;
use App\Repository\UserRepository;
use App\Service\FileUploaderService;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UserController extends AbstractController
{
    private $serviceUploader;

    public function __construct(FileUploaderService $myService)
    {
        $this->serviceUploader = $myService;
    }

    /**
     * @Route("/api/users/type", methods={"GET"}, name="api_users_by_type")
     */
    public function getUsersByType(UserRepository $userRepository)
    {
        $user = $this->getUser();
        $type = $user->getType() == 'STUDENT' ? 'COMPANY' : 'STUDENT';

        $users = $userRepository->findBy(['type' => $type]);
        if (!$users) {
            return new JsonResponse(['error' => "Users not found"], JsonResponse::HTTP_NOT_FOUND);
        } else {
            return $this->json(
                $users,
                Response::HTTP_OK,
                [],
                [
                    "groups" => [
                        "user_read",
                    ],
                ],
            );
        }
    }

    /**
     * @Route("/api/users/suggest", name="app_api_user_suggest", methods={"GET"})
     */
    public function getSuggest(UserRepository $userRepository): JsonResponse
    {
        $user = $this->getUser();

        //define the user type you're looking for
        $type = $user->getType() == 'STUDENT' ? 'COMPANY' : 'STUDENT';

        //below code is useless as we've already tested the type
        // if (!($this->isGranted('type', $type, ProfileVoter::class))) {
        //     return new JsonResponse(['error' => "No way to access this page...."], JsonResponse::HTTP_NOT_FOUND);
        // }

        // check if a user has a stage 
        $stage = $user->getStages();
        if (count($stage) == 0) {
            return new JsonResponse(['error' => "No stage found for this user"], JsonResponse::HTTP_NOT_FOUND);
        }

        // a student user can only have one stage
        $skills = $stage[0]->getSkills();
        $users = $userRepository->getSuggests($skills, $stage[0]->getStartDate(), $type);

        if (!$users) {
            return new JsonResponse(['error' => "No suggestions"], JsonResponse::HTTP_NOT_FOUND);
        }

        return $this->json(
            $users,
            Response::HTTP_OK,
            [],
            [
                "groups" => [
                    "user_browse",
                ],
            ],
        );
    }

    /**
     * @Route("/api/users/{id}", methods={"GET"}, name="api_users_read", requirements={"id"="\d+"})
     * @OA\Get(
     *     path="/api/users/{id}",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="302",
     *          description="Found / Return user information",
     *          @OA\JsonContent(ref="#/components/schemas/User-read")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="user not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="No way to view another profile than yours...")
     *        ) 
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token || Expired JWT Token")
     *         )
     *      ) 
     *    )
     * )
     * @OA\Schema(
     *     schema="User-read",
     *      description="User-read",
     *         @OA\Property(type="integer", property="id"),
     *         @OA\Property(type="string", property="email"),
     *         @OA\Property(type="string", property="type"),
     *         @OA\Property(type="string", property="companyName"),
     *         @OA\Property(type="string", property="siret"),
     *         @OA\Property(type="string", property="firstName"),
     *         @OA\Property(type="string", property="lastName"),
     *         @OA\Property(type="string", property="address"),
     *         @OA\Property(type="integer", property="postCode"),
     *         @OA\Property(type="string", property="city"),
     *         @OA\Property(type="boolean", property="is_user_active"),
     *         @OA\Property(type="boolean", property="showTuto"),
     *         @OA\Property(type="boolean", property="isProfileCompleted"),
     *         @OA\Property(type="string", property="profileImage"),
     *         @OA\Property(type="string", property="description"),
     *         @OA\Property(type="string", property="resume"),
     *         @OA\Property(type="string", property="linkedin"),
     *         @OA\Property(type="string", property="github"),
     *         @OA\Property(type="datetime", property="lastConnected_at"),
     *         @OA\Property(type="string", property="skills"),
     * )
     */
    public function read(User $user = null, UserRepository $userRepository)
    {
        //Use Doctrine param converter
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        } else {

            //Access voter to check if user is trying to update his own profile
            if (!($this->isGranted('view', $user, ProfileVoter::class))) {
                return new JsonResponse(['error' => "No way to view another profile than yours...."], JsonResponse::HTTP_FORBIDDEN);
            }
            return $this->json(
                $user,
                Response::HTTP_OK,
                [],
                [
                    "groups" => [
                        "user_read",
                    ],
                ],
            );
        }
    }

    /**
     * @Route("/api/users/{id}", methods={"PUT", "PATCH"}, name="api_users_edit", requirements={"id"="\d+"})
     * @OA\Put(
     *     path="/api/users/{id}",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content / Edit user information",
     *          @OA\JsonContent(ref="#/components/schemas/User-edit")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="user not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="No way to view another profile than yours...")
     *        ) 
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token || Expired JWT Token")
     *         )
     *      ) 
     *    )
     * )
     * @OA\Schema(
     *     schema="User-edit",
     *      description="User-edit",
     *         @OA\Property(type="integer", property="id"),
     *         @OA\Property(type="string", property="email"),
     *         @OA\Property(type="string", property="type"),
     *         @OA\Property(type="string", property="companyName"),
     *         @OA\Property(type="string", property="siret"),
     *         @OA\Property(type="string", property="firstName"),
     *         @OA\Property(type="string", property="lastName"),
     *         @OA\Property(type="string", property="address"),
     *         @OA\Property(type="integer", property="postCode"),
     *         @OA\Property(type="string", property="city"),
     *         @OA\Property(type="boolean", property="is_user_active"),
     *         @OA\Property(type="boolean", property="showTuto"),
     *         @OA\Property(type="boolean", property="isProfileCompleted"),
     *         @OA\Property(type="string", property="profileImage"),
     *         @OA\Property(type="string", property="description"),
     *         @OA\Property(type="string", property="resume"),
     *         @OA\Property(type="string", property="linkedin"),
     *         @OA\Property(type="string", property="github"),
     *         @OA\Property(type="datetime", property="lastConnected_at"),
     *         @OA\Property(type="string", property="skills"),
     * )
     */
    public function edit(
        User $user = null,
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $encoder
    ) {
        //Use Doctrine param converter
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        }

        //get the current hashed password
        $currentHashedPwd = $user->getPassword();

        //Access voter to check if user is trying to update his own profile
        if (!($this->isGranted('edit', $user, ProfileVoter::class))) {
            return new JsonResponse(['error' => "No way to edit another profile than yours...."], JsonResponse::HTTP_FORBIDDEN);
        }

        $content = $request->getContent();

        try {
            $userFromApi = $serialiser->deserialize($content, User::class, 'json', [
                AbstractNormalizer::OBJECT_TO_POPULATE => $user,
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['type', 'resume', 'profileImage']
            ]);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        //compare 'old' hashed password with the potential 'new' one
        // hash new pwd if needed
        if ($currentHashedPwd !== $userFromApi->getPassword()) {
            $updatedPwd = $encoder->hashPassword($user, $user->getPassword());
            $user->setPassword($updatedPwd);
        }

        $errors = $validator->validate($user, null, [strtolower($user->getType()), "registration"]);
        if (count($errors) > 0) {
            $errorMessages = [];
            foreach ($errors as $error) {
                $errorMessages[] = $error->getPropertyPath() . ': ' . $error->getMessage();
            }
            return $this->json(
                ["error" => $errorMessages],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        //TODO @ORM\PreUpdate not working as expected, so I manage this point manually
        $user->setUpdatedAt(new DateTime());
        // $entityManager->persist($user);
        $entityManager->flush();

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT,
        );
    }

    /**
     * @Route("/api/users/{id}/skill", name="app_api_user_add_skill", methods={"POST"}, requirements={"id"="\d+"})
     * @OA\Post(
     *     path="/api/users/{id}/skill",
     *     tags={"User"},
     *     @OA\Response(
     *          response="201",
     *          description="Created / Creation of a skill for a user ",
     *          @OA\JsonContent(ref="#/components/schemas/User-skill-add")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Skill not found || User not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token code || Expired JWT Token"),
     *        ) 
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-skill-add",
     *      description="User-skill-add",
     *         @OA\Property(type="integer", property="id"),
     * )
     */
    public function addSkill(User $user = null, Request $request, SkillRepository $skillRepository, EntityManagerInterface $entityManagerInterface): JsonResponse
    {

        //Use Doctrine param converter
        // Voter required to review identity
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        }

        $jsonData = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            // Handle the JSON decoding error here
            return $this->json(
                ["error" => json_last_error_msg()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        if (!isset($jsonData["skillList"])) {
            return $this->json(
                ["error" => ["skillList" => 'This value should not be blank.']],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        foreach ($jsonData['skillList'] as $skillId) {
            $skill = $skillRepository->findOneBy(["id" => $skillId]);
            if (!$skill) {
                return new JsonResponse(['error' => 'Skill not found'], Response::HTTP_NOT_FOUND);
            } else {
                $user->addSkill($skill);
            }
        }
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return $this->json(
            $user->getSkills(),
            Response::HTTP_CREATED,
        );
    }

    /**
     * @Route("/api/users/{id}/skill", name="app_api_user_delete_skill", methods={"DELETE"}, requirements={"id"="\d+"})
     * @OA\Delete(
     *     path="/api/users/{id}/skill",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content / Delete of a skill for a user ",
     *          @OA\JsonContent(ref="#/components/schemas/User-skill-delete")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Skill not found || User not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token code || Expired JWT Token"),
     *          )
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-skill-delete",
     *      description="User-skill-delete",
     *         @OA\Property(type="array",@OA\Items(type="integer"), property="skillList"),
     * )
     */
    public function removeSkill(User $user = null, Request $request, SkillRepository $skillRepository, EntityManagerInterface $entityManagerInterface): JsonResponse
    {
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        }

        $jsonData = json_decode($request->getContent(), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            // Handle the JSON decoding error here
            return $this->json(
                ["error" => json_last_error_msg()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        if (!isset($jsonData["skillList"])) {
            return $this->json(
                ["error" => ["skillList" => 'This value should not be blank.']],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        foreach ($jsonData['skillList'] as $skillId) {
            $skill = $skillRepository->findOneBy(["id" => $skillId]);
            if (!$skill) {
                return new JsonResponse(['error' => 'Skill not found'], Response::HTTP_NOT_FOUND);
            } else {
                $user->removeSkill($skill);
            }
        }
        $entityManagerInterface->persist($user);
        $entityManagerInterface->flush();

        return $this->json(
            null,
            Response::HTTP_NO_CONTENT,
        );
    }

    /**
     * @Route("/api/users/matches/from", name="app_api_user_matches_from", methods={"GET"})
     * @OA\Get(
     *     path="/api/users/matches/from",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="token",
     *          in="header",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content / Delete of a skill for a user ",
     *          @OA\JsonContent(ref="#/components/schemas/User-skill-delete")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Skill not found || User not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token code || Expired JWT Token"),
     *          )
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-smatch-from",
     *      description="User-match-from",
     *         @OA\Property(type="array",@OA\Items(type="array"), property="match"),
     * )
     */
    public function getMatchesFrom(MyMatchRepository $myMatchRepository): JsonResponse
    {
        $user = $this->getUser();
        $matches = $myMatchRepository->findMatchesFromMe($user);

        // front not able to process 404
        // if (!$matches) {
        //     return new JsonResponse(['error' => 'No matches found'], Response::HTTP_NOT_FOUND);
        // }

        return $this->json(
            $matches,
            Response::HTTP_OK,
            [],
            [
                "groups" => [
                    "matches",
                ],
            ],
        );
    }

    /**
     * @Route("/api/users/matches/to", name="app_api_user_matches_to", methods={"GET"})
     * @OA\Get(
     *     path="/api/users/matches/to",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="token",
     *          in="header",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content / Delete of a skill for a user ",
     *          @OA\JsonContent(ref="#/components/schemas/User-skill-delete")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Skill not found || User not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token code || Expired JWT Token"),
     *          )
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-match-to",
     *      description="User-match-to",
     *         @OA\Property(type="array",@OA\Items(type="array"), property="match"),
     * )
     */
    public function getMatchesTo(MyMatchRepository $myMatchRepository): JsonResponse
    {
        $user = $this->getUser();
        //$matches = $user->getMatchesToMe();
        //$users = $myMatchRepository->findMatchesToMe($user);
        $matches = $myMatchRepository->findMatchesToMe($user);
        // if (!$matches) {
        //     return new JsonResponse(['error' => 'No matches found'], Response::HTTP_NOT_FOUND);
        // }
        return $this->json(
            $matches,
            Response::HTTP_OK,
            [],
            [
                "groups" => [
                    "matches",
                ],
            ],
        );
    }

    /**
     * @Route("/api/users/matches/mutual", name="app_api_matches_mutual", methods={"GET"})
     * @OA\Put(
     *     path="/api/users/matches/mutual",
     *     tags={"User"},
     *      @OA\Parameter(
     *          name="token",
     *          in="header",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="302",
     *          description="Found / A user's matches",
     *          @OA\JsonContent(ref="#/components/schemas/User-match")
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT Token || Expired JWT Token"),
     *          )
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-match",
     *      description="User-match",
     *         @OA\Property(type="integer", property="id"),
     * )
     */
    public function getMutualMatches(UserRepository $userRepository): JsonResponse
    {
        $user = $this->getUser();
        //$matches = $myMatchRepository->findMutualMatches($user);

        //$users = $myMatchRepository->findMatchesMutual($user);
        $users = $userRepository->findMatchesMutual($user);
        // if (!$users) {
        //     return new JsonResponse(['error' => 'No users found'], Response::HTTP_NOT_FOUND);
        // }

        return $this->json(
            $users,
            Response::HTTP_OK,
            [],
            [
                "groups" => [
                    "user_browse",
                ],
            ],
        );
    }

    /**
     * @Route("/api/users/{id}/upload", methods={"POST"}, name="api_users_upload", requirements={"id"="\d+"})
     */
    public function uploadFile(Request $request, User $user = null, EntityManagerInterface $entityManager): JsonResponse
    {
        //Use Doctrine param converter
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        }
        $type = $request->request->get('type');
        $file = $request->files->get('file');

        if (!$file) {
            return new JsonResponse(['error' => 'Invalid file'], Response::HTTP_BAD_REQUEST);
        }

        $validTypes = ['profile_photo', 'resume'];

        if (!in_array($type, $validTypes)) {
            return $this->json(['error' => 'Invalid file type'], Response::HTTP_BAD_REQUEST);
        }
        try {
            $fileName = $this->serviceUploader->upload($file);
            if ($type === 'profile_photo') {
                $file = $user->getProfileImage();
                if (is_string($file) && !empty($file)) {
                    $this->serviceUploader->removeIfExists($file);
                }
                $user->setProfileImage($fileName);
            } else if ($type === 'resume') {
                $file = $user->getResume();
                if (is_string($file) && !empty($file)) {
                    $this->serviceUploader->removeIfExists($file);
                }
                $user->setResume($fileName);
            }
            $entityManager->flush();
        } catch (FileException $e) {
            return $this->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return new JsonResponse(['message' => 'file correctly uploaded'], Response::HTTP_OK);
    }

    /**
     * @Route("/api/users/{id}/download", methods={"POST"}, name="api_users_get_file", requirements={"id"="\d+"})
     */
    public function getFile(Request $request, User $user = null, EntityManagerInterface $entityManager): BinaryFileResponse
    {
        //Use Doctrine param converter
        if ($user === null) {
            return new JsonResponse(['error' => "User not found"], JsonResponse::HTTP_NOT_FOUND);
        }

        $data = json_decode($request->getContent(), true);
        $type = $data['type'] ?? null;

        $validTypes = ['profile_photo', 'resume'];

        if (!in_array($type, $validTypes)) {
            return $this->json(['error' => 'Invalid file type'], Response::HTTP_BAD_REQUEST);
        }

        if ($type === 'profile_photo') {
            $response = $this->serviceUploader->downloadIfExists($user->getProfileImage());
        } else if ($type === 'resume') {
            $response = $this->serviceUploader->downloadIfExists($user->getResume());
        }

        return $response;
    }
}
