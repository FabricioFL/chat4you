<?php

namespace App\Http;

class Router
{

    private static string $uri;
    private static array $queryParams;
    private static array $postVars;

    public static function get(string $route, $response, $params = [])
    {
        if($_SERVER['REQUEST_URI'] == $route)
        {
            header('Location:'.'../../resources/view/'.$response.'.php');
        }
    }

    public static function post(string $route, $response, $params = [])
    {
        //
    }
}