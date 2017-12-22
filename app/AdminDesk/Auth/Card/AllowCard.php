<?php
namespace AdminDesk\Auth\Card;

class AllowCard extends Card
{
    public static function get()
    {
        if (count($_COOKIE)) {

            if (isset($_COOKIE["uid"]) && isset($_COOKIE["sid"])) {
                return array(
                    "uid" => $_COOKIE["uid"],
                    "sid" => $_COOKIE["sid"]
                );
            }

        }

        return false;
    }
}