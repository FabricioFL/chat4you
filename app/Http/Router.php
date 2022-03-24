<?php

namespace App\Http;

class Router
{
    private static array $queryParams;
    private static array $postVars;

    public static function get(string $route, $response, $params = [])
    {
        if($_SERVER['REQUEST_URI'] == $route)
        {
            header('location:'.'../../resources/view/'.$response.'.php');
        }
    }

    public static function post(string $route, $response, $params = [])
    {
        //
    }
}