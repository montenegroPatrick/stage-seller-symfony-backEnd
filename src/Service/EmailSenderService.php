<?php

namespace App\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class EmailSenderService
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmail(string $emailFrom, string $textBody, string $htmlBody = null)
    {
        $email = (new Email())
            ->from($emailFrom)
            ->to('stage.seller.apo@gmail.com')
            ->subject('hello @stageSeller')
            ->text($textBody);

        if ($htmlBody !== null) {
            $email->html($htmlBody);
        }

        try {
            $this->mailer->send($email);
            return true;
        } catch (TransportExceptionInterface $e) {
            throw new TransportExceptionInterface('Could not move the file: ' . $e->getMessage());
            return false;
        }
    }
}
