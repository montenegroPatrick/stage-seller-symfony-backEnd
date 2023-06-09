<?php

namespace ContainerTOaKUUc;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

/**
 * @internal This class has been auto-generated by the Symfony Dependency Injection Component.
 */
class get_ServiceLocator_188KQThService extends App_KernelDevDebugContainer
{
    /**
     * Gets the private '.service_locator.188KQTh' shared service.
     *
     * @return \Symfony\Component\DependencyInjection\ServiceLocator
     */
    public static function do($container, $lazyLoad = true)
    {
        return $container->privates['.service_locator.188KQTh'] = new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($container->getService, [
            'encoder' => ['privates', 'security.user_password_hasher', 'getSecurity_UserPasswordHasherService', true],
            'jwtManager' => ['services', 'lexik_jwt_authentication.jwt_manager', 'getLexikJwtAuthentication_JwtManagerService', true],
            'serialiser' => ['services', '.container.private.serializer', 'get_Container_Private_SerializerService', true],
            'userRepository' => ['privates', 'App\\Repository\\UserRepository', 'getUserRepositoryService', true],
            'validator' => ['services', '.container.private.validator', 'get_Container_Private_ValidatorService', false],
        ], [
            'encoder' => '?',
            'jwtManager' => '?',
            'serialiser' => '?',
            'userRepository' => 'App\\Repository\\UserRepository',
            'validator' => '?',
        ]);
    }
}
