<?php
namespace AdminDesk\Auth\SID;

class SID
{
    public static function get($user)
    {
        return md5(md5($user->ip));
    }
}