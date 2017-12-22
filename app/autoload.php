<?php
class Autoload
{
    private static $dir = "app/";

    public static function init($class)
    {
        $file = str_replace("\\", "/", self::$dir . $class . ".php");
        
        if (file_exists($file)) {
            include $file;
        }
    }
}

spl_autoload_register('Autoload::init');