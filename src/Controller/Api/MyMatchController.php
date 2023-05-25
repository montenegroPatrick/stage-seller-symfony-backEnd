<?php

namespace App\Controller\Api;

use App\Entity\MyMatch;
use App\Repository\MyMatchRepository;
use App\Security\Voter\MyMatchVoter;
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
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Annotations as OA;

class MyMatchController extends AbstractController
{
    /**
     * @Route("/api/matches", name="app_api_my_match_add", methods={"POST"})
     * @OA\Post(
     *     path="/api/matches",
     *     tags={"Match"},
     *     @OA\Parameter(
     *          name="receveir",
     *          in="query",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="201",
     *          description="Created / Returns a like for the user who receives it",
     *          @OA\JsonContent(ref="#/components/schemas/Match-add")
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT || Expired JWT Token code"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="This value should not be blank")
     *         )
     *      ) 
     *    )
     * @OA\Schema(
     *     schema="Match-add",
     *      description="Match-add",
     *         @OA\Property(type="integer", property="receiver"),
     *         @OA\Property(type="boolean", property="isMutual"),
     * )
     */
    public function add(Request $request, ValidatorInterface $validator, SerializerInterface $serialiser, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = $this->getUser();

        //déserialize Json to Match entity
        try {
            //create a new myMatch object and populate it from serialization
            $match = new MyMatch();
            $match->setSender($user);
            $matchFromApi = $serialiser->deserialize($request->getContent(), MyMatch::class, 'json', [
                'object_to_populate' => $match,
                AbstractNormalizer::IGNORED_ATTRIBUTES => ['sender', 'isMutual']
            ]);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_UNPROCESSABLE_ENTITY,
            );
        }

        // Check if there are any errors
        $errors = $validator->validate($match);
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

        // check if match record already exists for this association
        $existingMatch = $entityManager->getRepository(MyMatch::class)->findOneBy([
            'sender' => $user,
            'receiver' => $match->getReceiver(),
        ]);
        if ($existingMatch) {
            return new JsonResponse(['error' => 'Match record already exists'], Response::HTTP_BAD_REQUEST);
        }

        // check if match record already exists for this association (reverse)
        $existingMatch = $entityManager->getRepository(MyMatch::class)->findOneBy([
            'sender' => $match->getReceiver(),
            'receiver' => $user,
        ]);
        if ($existingMatch) {
            return new JsonResponse(['error' => 'Match record already exists'], Response::HTTP_BAD_REQUEST);
        }

        // Check if the user is allowed to create a match
        if (!$this->isGranted('post', $match, MyMatchVoter::class)) {
            return new JsonResponse(['message' => 'Access denied'], Response::HTTP_FORBIDDEN);
        }

        $entityManager->persist($match);
        $entityManager->flush();

        return $this->json(
            [
                'message' => 'Match created',
            ],
            Response::HTTP_CREATED
        );
    }

    /**
     * @Route("/api/matches/{id}", name="app_api_my_match_edit", methods={"PUT", "PATCH"})
     * @OA\Put(
     *     path="/api/matches/{id}",
     *     tags={"Match"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content",
     *          @OA\JsonContent(ref="#/components/schemas/Match-edit")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Match not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT || Expired JWT Token code"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Only the receiver can update the match code")
     *         )
     *      ) ,
     *      @OA\Response(
     *          response="422",
     *          description="Unprocessable Entity",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="receiver: This value should not be blank")
     *         )
     *      ) ,
     *    )
     * )
     * @OA\Schema(
     *     schema="Match-edit",
     *      description="Match-edit",
     *         @OA\Property(type="string", property="token"),
     * )
     */
    public function edit(
        MyMatch $match = null,
        EntityManagerInterface $entityManager
    ): JsonResponse {

        if ($match === null) {
            return new JsonResponse(['error' => 'Match not found'], 404);
        }

        //Check if the user is allowed to create a match
        if (!$this->isGranted('edit', $match, MyMatchVoter::class)) {
            return new JsonResponse(['error' => 'Only the receiver can update the match'], Response::HTTP_FORBIDDEN);
        }

        // Check if match is not yet completed
        if ($match->isIsMutual()) {
            return new JsonResponse(['message' => 'Match already up to date'], Response::HTTP_NOT_MODIFIED);
        }
        // Update isMutual value to true
        $match->setIsMutual(true);
        $match->setUpdatedAt(new DateTime());

        $entityManager->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route("/api/matches/{id}", name="app_api_my_match_delete", methods={"DELETE"})
     * @OA\Delete(
     *     path="/api/matches/{id}",
     *     tags={"Match"},
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="204",
     *          description="No Content / Delete of a match user",
     *          @OA\JsonContent(ref="#/components/schemas/Match-delete")
     *      ),
     *      @OA\Response(
     *          response="404",
     *          description="Not Found",
     *          @OA\JsonContent(
     *              @OA\Property(property="error", type="string", example="Match not found"),
     *          )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Invalid JWT || Expired JWT Token code"),
     *          )
     *      ),
     *    )
     * )
     * @OA\Schema(
     *     schema="Match-delete",
     *      description="Match-delete",
     *         @OA\Property(type="string", property="match"),
     * )
     */
    public function delete(
        MyMatch $match = null,
        MyMatchRepository $myMatchRepository
    ): JsonResponse {

        if ($match === null) {
            return new JsonResponse(['error' => 'Match not found'], 404);
        }

        if ($match->isIsMutual()) {
            return new JsonResponse(['error' => "Can't remove this match - already mutual"], Response::HTTP_NOT_MODIFIED);
        }


        $myMatchRepository->remove($match, true);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
