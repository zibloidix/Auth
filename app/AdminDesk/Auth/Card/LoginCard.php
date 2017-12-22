<?php
namespace AdminDesk\Auth\Card;

class LoginCard extends Card
{
    public static function get()
    {
        if (count($_POST)) {

            if (isset($_POST["login"]) && isset($_POST["password"])) {
                return array(
                    "login" => $_POST["login"],
                    "password" => $_POST["password"]
                );
            }

        }

        return false;
    }
}