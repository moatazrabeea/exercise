<?php


namespace App\controller;

use App\common\Document;
use App\lib\View;
use App\model\Customers;
use App\lib\Controller;
//include ('lib/Controller.php');
//include_once ('lib/Controller.php');

class Customer extends Controller
{
   public function index(){

      $customers=Customers::getALL();
      //$this->render('View/index',$customers);
      //return ($this->load_view($customers,true));
       $view = new View('index');
       $view->assign('customers', $customers);
       //include ('./app/View/index.php');
       //exit();
   }
}