<?php
class Autoload
{
    private static $dir = "app/";

    public static function init($class){
        $file = str_replace("\\", "/", $dir . $class . ".php");
        if(file_exists($file)){
            include $file;
        }
    }
}

// function autoload($class){
//     $dir = "app/";
//     $file = str_replace("\\", "/", $dir . $class . ".php");
//     if(file_exists($file)){
//         include $file;
//     }
// }
// spl_autoload_register('Autoload::init');