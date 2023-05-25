<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Exception\UserAlreadyExistsException;
use App\Repository\UserRepository;
use DateTime;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Serializer\SerializerInterface;
use OpenApi\Annotations as OA;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;

class RegisterController extends AbstractController
{
    /**
     * @Route("/api/register", name="app_api_register", methods={"POST"})
     * @OA\Post(
     *     path="/api/register",
     *     tags={"User"},
     *     @OA\Parameter(
     *          name="email",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *          name="password",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *          name="first_name",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *          name="last_name",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *          name="address",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Parameter(
     *          name="post_code	",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="201",
     *          description="Created / Creation of a user, returns the user's information and token",
     *          @OA\JsonContent(ref="#/components/schemas/User-register")
     *      ),
     *      @OA\Response(
     *          response="409",
     *          description="Already existing user",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="User Already exists"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="This email is already taken || companyName / siret : This value should not be blank"),
     *        ) 
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="User-register",
     *      description="User-register",
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
     *         @OA\Property(type="string", property="token"),
     * )
     */
    public function index(
        UserRepository $userRepository,
        Request $request,
        SerializerInterface $serialiser,
        ValidatorInterface $validator,
        UserPasswordHasherInterface $encoder,
        JWTTokenManagerInterface $jwtManager
    ): JsonResponse {

        $content = $request->getContent();

        //deserialize Json to User entity
        try {
            $userFromApi = $serialiser->deserialize($content, User::class, 'json', [
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['resume', 'profileImage']
            ]);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $errors = $validator->validate($userFromApi, null, [strtolower($userFromApi->getType()), "registration", "choice"]);
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

        // hash password
        $userFromApi->setPassword($encoder->hashPassword($userFromApi, $userFromApi->getPassword()));

        // Update LastConnectedAt
        $userFromApi->setLastConnected(new DateTime());

        // ['ROLE_USER'] is the default role
        $userFromApi->setRoles(['ROLE_USER']);

        //create user
        $userRepository->add($userFromApi, true);


        // Generate a JWT token
        $token = $jwtManager->create($userFromApi);
        // return new JsonResponse(['token' => $JWTManager->create($userFromApi)]);
        return $this->json(
            [
                "user" => $userFromApi,
            ],
            Response::HTTP_CREATED,
            [
                'authorization' => $token,
                'Access-Control-Expose-Headers' => 'authorization'
            ],
            [
                "groups" => [
                    "user_read",
                ],
            ],
        );
    }
}
