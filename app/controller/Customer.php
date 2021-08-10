<?php


namespace App\controller;

use App\lib\View;
use App\model\Customers;
use App\lib\Pagination;

class Customer
{
    private $error = array();

   public function index(){

          if ($_SERVER['REQUEST_METHOD'] === 'GET'){
              $this->getcustomers();
          }


   }
   public function getcustomers(){

       $valid=true;

       if (isset($_GET['filter_name']) || isset($_GET['filter_phone'])){

           $valid=$this->validateRequest();
       }
       $data['errors'] = $this->error;

if ($valid) {
    $limit = Pagination::limit;

    if (isset($_GET['pageno'])) {
        $pageNo = $_GET['pageno'];
    }
    if (isset($pageNo) && $pageNo > 0) {
        $start = ($_GET['pageno'] - 1) * $limit;
    } else {
        $pageNo = 1;
        $start = 0;
    }

    $filter_data = array(
        'start' => $start,
        'limit' => $limit,
        'filter_name' => $_GET['filter_name'] ?? null,
        'filter_phone' => $_GET['filter_phone'] ?? null,
    );

    $customers = Customers::getALL($filter_data);
    $data['customers'] = $customers;

    $totalPages = Customers::getTotalPages();

    $pagination = new Pagination();
    $pagination->total = $totalPages;
    $pagination->page = $pageNo;
    $data['pagination'] = $pagination->render();
}
       $view = new View('index');
       $view->assign('data', $data);
   }

   protected function validateRequest(){
       if (isset($_GET['filter_name'])){
           $_GET['filter_name']=trim($_GET['filter_name']);
           if($_GET['filter_name'] > 255 && preg_match("/^([a-zA-Z' ]+)$/",$_GET['filter_name'])){

           }
           else{
               $this->error['name']='invalid filter name';
                }
       }
       if (isset($_GET['filter_phone'])){
           $_GET['filter_phone']=trim($_GET['filter_phone']);
          //regular expression match numbers like (3digits)space[from 0 to 15 digits its value between 0 & 9]
          if (!preg_match("/^\({1}[0-9]{3}\)\s[0-9]{0,15}$/",$_GET['filter_phone'])){
               $this->error['phone']='invalid Phone Number';
           }

       }
       return !$this->error;
   }
}