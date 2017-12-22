<?php
namespace AdminDesk\Auth\Card;

class Card
{
    protected $info = null;

    public function __construct($info)
    {
        $this->info = $info;
    }

    public function __get($var)
    {
        if (isset($this->$var)) {
            return $this->$var;
        }
    }

    public static function get()
    {
        $loginCard = LoginCard::get();
        $allowCard = AllowCard::get();

        if ($loginCard) {
            return new LoginCard($loginCard);
        }

        if ($allowCard) {
            return new AllowCard($allowCard);
        }

        return false;
    }
}