<?php


namespace App;

use App\model\Customers;
use Lib\Controller;

class Customer extends Controller
{
   public function index(){

      $customers=Customers::getALL();
      $this->render('View/index',$customers);
   }
}