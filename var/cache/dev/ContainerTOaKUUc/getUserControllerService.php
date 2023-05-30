<?php

namespace ContainerTOaKUUc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class getUserControllerService extends App_KernelDevDebugContainer
{
    /**
     * Gets the public 'App\Controller\Api\UserController' shared autowired service.
     *
     * @return \App\Controller\Api\UserController
     */
    public static function do($container, $lazyLoad = true)
    {
        include_once \dirname(__DIR__, 4).'/vendor/symfony/framework-bundle/Controller/AbstractController.php';
        include_once \dirname(__DIR__, 4).'/src/Controller/Api/UserController.php';
        include_once \dirname(__DIR__, 4).'/src/Service/FileUploaderService.php';

        $container->services['App\\Controller\\Api\\UserController'] = $instance = new \App\Controller\Api\UserController(new \App\Service\FileUploaderService(($container->privates['parameter_bag'] ?? ($container->privates['parameter_bag'] = new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($container)))));

        $instance->setContainer(($container->privates['.service_locator.GNc8e5B'] ?? $container->load('get_ServiceLocator_GNc8e5BService'))->withContext('App\\Controller\\Api\\UserController', $container));

        return $instance;
    }
}