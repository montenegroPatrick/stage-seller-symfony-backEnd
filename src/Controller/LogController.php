<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LogController extends AbstractController
{
    /**
     * @Route("/log", name="app_log")
     */
    public function index(LoggerInterface $loggerInterface): Response
    {

       $loggerInterface->debug("Ceci est un message de debug");
       $loggerInterface->info("Ceci est un message d'info");
       $loggerInterface->notice("Ceci est un message de notice");
       $loggerInterface->warning("Ceci est un message d'avertissement");
       $loggerInterface->error("Ceci est  un message d'erreur");
       $loggerInterface->critical("Ceci est un message critique");
       $loggerInterface->alert("Ceci est un message d'alert");
       $loggerInterface->emergency("Ceci est un message d'urgence");

        return $this->render('log/index.html.twig');
    }
}
