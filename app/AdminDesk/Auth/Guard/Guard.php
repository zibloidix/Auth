<?php
namespace AdminDesk\Auth\Guard;

use AdminDesk\Auth\Access\Access;
use AdminDesk\Auth\Journal\Journal;

class Guard
{
    public static function check($user, $gateGroup = null)
    {
        if (self::gateGroup($user, $gateGroup)) {

            if (self::allowGroup($user)) {
                $journal = new Journal();

                if ($journal->checkLoginCard($user->card)) {
                    $allowRecord = $journal->createAllowRecord($user, $user->card);
                    
                    if ($allowRecord) {
                        return Access::allow($allowRecord);
                    }
                }

                if ($journal->checkAllowCard($user->card)) {
                    return Access::allow();
                }

                return Access::deny();
            }

            return true; // Run callback for User in the $gateGroup only
        }

        return false; // Don't run any callback
    }

    private static function gateGroup($user, $gateGroup)
    {
        return in_array(get_class($user), $gateGroup);
    }

    private static function allowGroup($user)
    {
        return in_array(get_class($user), Access::allowUsers());
    }
}