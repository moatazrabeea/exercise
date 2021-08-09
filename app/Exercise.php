<?php


namespace App;

use App\controller\Customer;


class Exercise
{

    public static function handleRequest() {

        $url=$_SERVER['REQUEST_URI'];
        $method=$_SERVER['REQUEST_METHOD'];
        $parsed_url=parse_url($url);
        $route=$parsed_url['path'];
        //var_dump($route);die();
//        var_dump($route);die();
//        if (($url === "/exercise/" || "/exercise/pageno") && $method=='GET'){
//           $controller=new Customer();
//            $controller->index();
//        }

        if ($route === "/"){
            $controller=new Customer();
            $controller->index();
        }
    }
}