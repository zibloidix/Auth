<?php
namespace AdminDesk\Auth\Gate;

use AdminDesk\Auth\Guard\Guard;

class Gate
{
    public static function enter($user, $gateGroup, $callback)
    {
        if (Guard::check($user, $gateGroup)) {
            $callback();
        }
    }
}