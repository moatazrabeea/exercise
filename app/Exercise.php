<?php


namespace App;

use App\Customer;


class Exercise
{

    public static function handleRequest() {

        $url=$_SERVER['REQUEST_URI'];
        $method=$_SERVER['REQUEST_METHOD'];

        if ($url === "/exercise/" && $method=='GET'){
           $controller=new Customer();
            $controller->index();
        }
    }
}