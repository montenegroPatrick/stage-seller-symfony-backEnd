<?php

namespace App\Security\Voter;

use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class ProfileVoter extends Voter
{
    // these strings are just invented: you can use anything
    const VIEW = 'view';
    const EDIT = 'edit';
    const TYPE = 'type';

    protected function supports(string $attribute, $subject): bool
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::VIEW, self::EDIT, self::TYPE])) {
            return false;
        }

        // if (!$subject instanceof User) {
        //     return false;
        // }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        // if ($subject->getId() !== $user->getId()) {
        //     return false;
        // }

        switch ($attribute) {
            case self::TYPE:
                //users of type student can review companies profiles
                //users of type company can review student profiles
                return strtolower($user->getType()) !== $subject;

            case self::VIEW:
                // only a user can view his own account
                return $subject->getId() == $user->getId();
            case self::EDIT:
                // only a user can view his own account
                return $subject->getId() == $user->getId();
        }

        return false;
    }
}
