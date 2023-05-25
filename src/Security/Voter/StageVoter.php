<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class StageVoter extends Voter
{
    public const EDIT = 'edit';
    public const POST = 'post';

    protected function supports(string $attribute, $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return in_array($attribute, [self::EDIT, self::POST])
            && $subject instanceof \App\Entity\Stage;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }

        switch ($attribute) {
            case self::POST:
                //a student can't only create one stage
                if (
                    $user->getType() === 'STUDENT' &&
                    count($user->getStages()) > 0
                ) {
                    return false;
                };
            case self::EDIT:
                if ($user != $subject->getUser()) {
                    return false;
                }
        }
        return true;
    }
}
