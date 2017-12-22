<?php
namespace AdminDesk\Auth\Access;

class Access
{
    const DENY_URL = "./error.html";
    const DENY_USERS = [
        'AdminDesk\Auth\User\DenyUser'
    ];
    const ALLOW_USERS = [
        'AdminDesk\Auth\User\LoginUser', 
        'AdminDesk\Auth\User\AllowUser'
    ];
    
    public static function deny()
    {
        setcookie('uid', '', time()-3600);
        setcookie('sid', '', time()-3600);
        header('Location:'.self::DENY_URL, true, 307);

        return false;
    }

    public static function allow($allowRecord = null)
    {
        header('Access-Token: '.self::getToken());
        if( isset($allowRecord["uid"]) && 
            isset($allowRecord["sid"]) ){
            setcookie(
                "uid", 
                $allowRecord["uid"], 
                time()+3600
            );
            setcookie(
                "sid", 
                $allowRecord["sid"], 
                time()+3600
            );
        }

        return true;
    }

    public static function denyUsers()
    {
        return self::DENY_USERS;
    }

    public static function allowUsers()
    {
        return self::ALLOW_USERS;
    }

    private static function getToken()
    {
        $token = "";
        $chars = "0123456789abcdefghijklmnopqrstuvwxyz";
        
        for ($i = 0; $i < 10; $i++) {
            $token .= $chars[ rand(0, strlen($chars) - 1) ];
        }

        return md5($token);
    }
}