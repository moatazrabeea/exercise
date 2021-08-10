<?php


namespace App;

use App\controller\Customer;


class Exercise
{

    public static function handleRequest() {

        $url=$_SERVER['REQUEST_URI'];

        $parsed_url=parse_url($url);
        $route=$parsed_url['path'];


        if ($route === "/"){
            $controller=new Customer();
            $controller->index();
        }
    }
}