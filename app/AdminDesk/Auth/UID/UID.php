<?php
namespace AdminDesk\Auth\UID;

class UID
{
    public static function get($user)
    {
        return md5(md5($user->login));
    }
}