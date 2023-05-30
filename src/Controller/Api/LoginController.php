<?php

namespace App\Controller\Api;

use App\Entity\User;
use App\Repository\UserRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Core\Exception\UserNotFoundException;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use OpenApi\Annotations as OA;

class LoginController extends AbstractController
{
    /**
     * @Route("/api/login", name="app_api_login", methods={"POST"})
     * @OA\Info(title="API StageSeller", version="0.1")
     * @OA\Server(
     *      url="http://localhost:8000/api",
     *      description="Api StageSeller")
     * @OA\Post(
     *     path="/api/login",
     *     tags={"User"},
     *     @OA\Parameter(
     *          name="username",
     *          in="query",
     *          required=true,
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *           in="query",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="202",
     *          description="Accepted / Return the user's token once they are identified and authenticated",
     *          @OA\JsonContent(ref="#/components/schemas/User-login")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Invalid credentials")
     *      ) 
     *    )
     * )
     * @OA\Schema(
     *     schema="User-login",
     *      description="User-login",
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
    public function login(Request $request, JWTTokenManagerInterface $jwtManager, UserRepository $userRepository,  UserPasswordHasherInterface $encoder, ValidatorInterface $validator, EntityManagerInterface $entityManager): JsonResponse
    {
        //Get posted data from request
        $data = json_decode($request->getContent(), true);
        $username = $data['email'] ?? null;
        $password = $data['password'] ?? null;

        try {
            //Check if user already exists
            $user = $userRepository->findOneBy(["email" => $username]);
            //if not throw exception
            if (!$user instanceof User) {
                throw new UserNotFoundException();
            }
        } catch (\Throwable $th) {
            return new JsonResponse(['error' => "Invalid credentials"], JsonResponse::HTTP_NOT_FOUND);
        }

        try {
            // Check the user's credentials
            if (!$encoder->isPasswordValid($user, $password)) {
                throw new BadCredentialsException();
            }
        } catch (\Throwable $th) {
            return new JsonResponse(['error' => "Invalid credentials"], JsonResponse::HTTP_NOT_FOUND);
        }


        // Generate a JWT token
        $token = $jwtManager->create($user);


        // Update LastConnectedAt
        $user->setLastConnected(new DateTime());
        $entityManager->persist($user);

        // Return the token as a JSON response
        return $this->json(
            [
                "user" => $user
            ],
            Response::HTTP_ACCEPTED,
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
