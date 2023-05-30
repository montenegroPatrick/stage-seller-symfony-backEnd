<?php

namespace App\Controller\Api;

use App\Service\EmailSenderService;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    /**
     * @Route("/api/mail", name="app_api_mail", methods={"POST"})
     */

    //! NO TOKEN REQUIRED
    public function index(Request $request, EmailSenderService $emailSender): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $email = $data['email'] ?? null;
        $textBody = $data['textBody'] ?? null;


        try {
            $emailSender->sendEmail($email, $textBody);
        } catch (\Throwable $th) {
            return $this->json(
                ["error" => $th->getMessage()],
                Response::HTTP_BAD_GATEWAY,
            );
        }

        return $this->json(
            ["message" => "email sent"],
            Response::HTTP_OK,
        );
    }
}
