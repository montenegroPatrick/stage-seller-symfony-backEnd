<?php

namespace App\Controller\Api;

use App\Repository\SkillRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Annotations as OA;

class SkillController extends AbstractController
{
    /**
     * @Route("/api/skills", name="app_api_skill", methods={"GET"})
     * @OA\Get(
     *     path="/api/skills",
     *     tags={"Skills"},
     *     @OA\Parameter(
     *          name="token",
     *          in="header",
     *          required=true,
     *      ),
     *     @OA\Response(
     *          response="202",
     *          description="Accepted / Return the list of skills",
     *          @OA\JsonContent(ref="#/components/schemas/Skill-read")
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
     *     schema="Skill-read",
     *      description="Skill-read",
     *         @OA\Property(type="integer", property="id"),
     *         @OA\Property(type="string", property="type"),
     *         @OA\Property(type="string", property="name"),
     * )
     */
    public function browse(SkillRepository $skillRepository): JsonResponse
    {
        $skills = $skillRepository->findAll();
        $user = $this->getUser();
        $isGranted = $this->isGranted("TEST", $skills);

        return $this->json(
            $skills,
            Response::HTTP_ACCEPTED
        );
    }
}
