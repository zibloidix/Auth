<?php
namespace AdminDesk\Auth\Journal;

use AdminDesk\Auth\DB\DB;
use AdminDesk\Auth\UID\UID;
use AdminDesk\Auth\SID\SID;
use AdminDesk\Auth\Card\LoginCard;
use AdminDesk\Auth\Card\AllowCard;

class Journal
{
    private $db = null;
    private $allowRecord = null;
    
    public function __construct()
    {
        $this->db = DB::PDO();
    }

    public function checkLoginCard($loginCard)
    {
        if ($loginCard instanceof LoginCard) {
            $req = $this->db->prepare(
                "SELECT * FROM users WHERE 
                 login = :login AND 
                 password = :password"
            );
            $req->execute($loginCard->info);
            $res = $req->fetch();

            return ($res) ? true : false;
        }

        return false;
    }

    public function checkAllowCard($allowCard)
    {
        if ($allowCard instanceof AllowCard) {
            $req = $this->db->prepare(
                "SELECT * FROM users WHERE 
                 uid = :uid AND 
                 sid = :sid"
            );
            $req->execute($allowCard->info);
            $res = $req->fetch();

            return ($res) ? true : false;
        }

        return false;
    }

    public function giveAllowCard()
    {
        if (new AllowCard($this->allowRecord)) {
            setcookie(
                "uid", 
                $this->allowRecord["uid"], 
                time()+3600
            );
            setcookie(
                "sid", 
                $this->allowRecord["sid"], 
                time()+3600
            );

            return true;
        }

        return false;
    }

    public function createAllowRecord($user, $loginCard)
    {
        if ($loginCard instanceof LoginCard) {
            $this->allowRecord = array(
                "uid" => UID::get($user),
                "sid" => SID::get($user)
            );

            $req = $this->db->prepare(
                "UPDATE users SET
                 uid = :uid, 
                 sid = :sid
                 WHERE login = :login
                 AND password = :password"
            );

            $req->execute(array_merge(
                $this->allowRecord,
                $loginCard->info
            ));

            if ($this->allowRecord) {
                return $this->allowRecord;
            }

            return false;
        }
    }
}