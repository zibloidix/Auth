<?php
namespace AdminDesk\Auth\User;

use AdminDesk\Core\IP\IP;
use AdminDesk\Auth\Card\Card;
use AdminDesk\Auth\User\DenyUser;
use AdminDesk\Auth\User\AllowUser;
use AdminDesk\Auth\Card\LoginCard;
use AdminDesk\Auth\Card\AllowCard;

class User
{
    protected $ip = null;
    protected $card = null;

    public function __construct($card)
    {
        $this->ip = IP::get();
        $this->card = $card;
    }

    public function __get($var)
    {
        if (isset($this->$var)) {
            return $this->$var;
        }
    }

    static public function get()
    {
        $card = Card::get();

        if ($card instanceof LoginCard) {
            return new LoginUser($card);
        }

        if ($card instanceof AllowCard) {
            return new AllowUser($card);
        }

        return new DenyUser();
    }
}