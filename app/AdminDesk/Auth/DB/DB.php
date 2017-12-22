<?php
namespace AdminDesk\Auth\DB;

class DB
{
    private static $user = "root";
    private static $pass = "lomov";
    private static $driver = "mysql";
    private static $host = "127.0.0.1";
    private static $dbname = "u466281";

    public static function PDO()
    {
        $conf = self::$driver. 
                ":host=".self::$host. 
                ";dbname=".self::$dbname;
        try {
            return new \PDO($conf, self::$user, self::$pass);
        } catch (\Exception $error) {
            return false;
        }
    }
}