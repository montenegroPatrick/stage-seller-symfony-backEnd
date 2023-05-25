<?php

namespace App\Controller\Api;

use App\Entity\Stage;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use OpenApi\Annotations as OA;

class StageController extends AbstractController
{
    /**
     * @Route("/api/stages", name="app_api_stage_add", methods={"POST"})
     * @OA\Get(
     *     path="/api/stages",
     *     tags={"Stage"},
     *     @OA\Parameter(
     *          name="token",
     *          in="header",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="202",
     *          description="Accepted / add stage",
     *          @OA\JsonContent(ref="#/components/schemas/Stage-add")
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
     *     schema="Stage-add",
     *      description="Stage-add",
     *         @OA\Property(type="string", property="description"),
     *         @OA\Property(type="date", property="startDate"),
     *         @OA\Property(type="integer", property="duration"),
     *         @OA\Property(type="string", property="location"),
     *         @OA\Property(type="boolean", property="isRemoteFriendly"),
     *         @OA\Property(type="boolean", property="isTravelFriendly"),
     *         @OA\Property(type="array", property="skills"),
     * )
     */
    public function add(Request $request, EntityManagerInterface $entityManager, SerializerInterface $serialiser, ValidatorInterface $validator): JsonResponse
    {
        //this->getUser() type is UserInterface
        //VSCode don't know which class implements the interface
        $user = $this->getUser();

        //déserialize Json to Stage entity
        try {
            //create a new stage object and populate it from serialization
            $stage = new Stage();
            $serialiser->deserialize($request->getContent(), Stage::class, 'json', ['object_to_populate' => $stage]);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        $errors = $validator->validate($stage);
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

        $stage->setUser($user);

        // Student user is only allowed to create one stage
        if (!($this->isGranted('post', $stage, StageVoter::class))) {
            return new JsonResponse(['error' => "as a student, you can only create one stage"], JsonResponse::HTTP_FORBIDDEN);
        }

        $stage->setUpdatedAt(new DateTime());

        $entityManager->persist($stage);
        $entityManager->flush();

        return $this->json(
            $stage,
            Response::HTTP_CREATED,
            [],
            [
                "groups" => [
                    "stage_read",
                ],
            ],
        );
    }

    /**
     * @Route("/api/stages/{id}", methods={"PUT", "PATCH"}, name="api_stages_edit", requirements={"id"="\d+"})
     * @OA\Put(
     *     path="/api/stages/{id}",
     *     tags={"Stage"},
     *     @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="202",
     *          description="Accepted / edit stage",
     *          @OA\JsonContent(ref="#/components/schemas/Stage-edit")
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
     *     schema="Stage-edit",
     *      description="Stage-edit",
     *         @OA\Property(type="string", property="description"),
     *         @OA\Property(type="date", property="startDate"),
     *         @OA\Property(type="integer", property="duration"),
     *         @OA\Property(type="string", property="location"),
     *         @OA\Property(type="boolean", property="isRemoteFriendly"),
     *         @OA\Property(type="boolean", property="isTravelFriendly"),
     *         @OA\Property(type="array", property="skills"),
     * )
     */
    public function edit(
        Stage $stage = null,
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator,
        EntityManagerInterface $entityManager
    ) {
        //Use Doctrine param converter
        if ($stage === null) {
            return new JsonResponse(['error' => "Stage not found"], JsonResponse::HTTP_NOT_FOUND);
        }
        //TODO UPDATED VOTER
        //Access voter to check if user is trying to update his own stage
        if (!($this->isGranted('edit', $stage, StageVoter::class))) {
            return new JsonResponse(['error' => "No way to edit another stage than yours...."], JsonResponse::HTTP_FORBIDDEN);
        }

        $content = $request->getContent();

        try {
            $serialiser->deserialize($content, Stage::class, 'json', [AbstractNormalizer::OBJECT_TO_POPULATE => $stage]);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $errors = $validator->validate($stage);
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
        $stage->setUpdatedAt(new DateTime());
        // $entityManager->persist($user);
        $entityManager->flush();

        return $this->json(
            $stage,
            Response::HTTP_OK,
            [],
            [
                "groups" => [
                    "stage_read",
                ],
            ],
        );
    }
}
