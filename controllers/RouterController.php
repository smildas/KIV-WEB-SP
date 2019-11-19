<?php

class RouterController extends Controller{


    protected $controller;

    function proccess($parameters)
    {
        $parsedURL = $this->parseURL($parameters[0]);
        $controllerClass = $this->dashToCamel(array_shift($parsedURL)) . "Controller";

        echo ($controllerClass);
        echo "<br/>";
        print_r($parsedURL);
    }

    function parseURL($url){
        $parsedURL = parse_url($url);
        $parsedURL["path"] = ltrim($parsedURL["path"], "/");
        $parsedURL["path"] = trim($parsedURL["path"]);
        $explodedPath = explode("/", $parsedURL["path"]);

        return $explodedPath;
    }

    private function dashToCamel($text) {
        $result = str_replace('-', ' ', $text);
        $result = ucwords($result);
        $result = str_replace(' ', '', $result);
        return $result;
    }

}

?>