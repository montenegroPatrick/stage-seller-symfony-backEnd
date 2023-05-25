<?php

namespace App\Security\Voter;

use App\Entity\MyMatch;
use App\Entity\User;
use PhpParser\Node\Expr\Match_;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;


class MyMatchVoter extends Voter
{
    // these strings are just invented: you can use anything
    const EDIT = 'edit';
    const POST = 'post';

    protected function supports(string $attribute, $subject): bool
    {
        // if the attribute isn't one we support, return false
        if (!in_array($attribute, [self::EDIT, self::POST])) {
            return false;
        }

        if (!$subject instanceof MyMatch) {
            return false;
        }

        return true;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();

        if (!$user instanceof UserInterface) {
            return false;
        }

        $match = $subject;

        //TODO
        //self::VIEW =>  return $subject->getSender() == $user || $subject->getReceiver() == $user;
        switch ($attribute) {
            case self::POST:
                //check that a user can't like himself and that a user can't like another user of same type
                return $subject->getReceiver()->getType() != $user->getType() &&
                    $subject->getReceiver() != $user;
            case self::EDIT:
                return $user === $match->getReceiver();
        }
        return false;
    }
}
