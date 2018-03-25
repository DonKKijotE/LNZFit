<?php

namespace App\Security;

use App\Entity\Place;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class PlaceVoter extends Voter
{

  const MANAGE = 'manage';

  protected function supports($attribute, $subject)
    {

        if (!in_array($attribute, array(self::MANAGE))) {
            return false;
        }


        if (!$subject instanceof Place) {
            return false;
        }

        return true;
    }


    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();

        if (!$user instanceof User) {
            // the user must be logged in; if not, deny access
            return false;
        }


        $place = $subject;

        switch ($attribute) {
            case self::MANAGE:
                return $this->canManage($place, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canManage(Place $place, User $user)
    {

       $admin = $place->getAdmin();

       if (in_array($user->getId(), $admin)) {
         return true;
       }

        else { return false; }

        // this assumes that the data object has a getOwner() method
        // to get the entity of the user who owns this data object
        //return $user === $post->getOwner();
    }


}
