<?php
namespace AdminDesk\Core\View;

class View
{
    const VIEW_EXT = ".tpl";
    const VIEW_DIR = "./app/views/";
  
    private static function getView($viewName)
    {
        $view = self::VIEW_DIR . $viewName . self::VIEW_EXT;
        if (!file_exists($view)) {
          return false;
        }

        return fread(fopen($view, 'r'), filesize($view));
    }

    private static function addBrackets($viewKeys)
    {
        return array_map(function($key){
            return "%" . $key . "%";
        }, $viewKeys);
    }

    private static function insertData($view, $args)
    {
        if (count($args)) {
            $keys = self::addBrackets(array_keys($args));
            $vals = array_values($args);
            return str_replace($keys, $vals, $view);
        }
        
        return $view;
    }

    public static function print($viewName, $args = null)
    {
        print (self::insertData(self::getView($viewName), $args));
    }
}