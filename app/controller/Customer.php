<?php


namespace App\controller;

use App\common\Document;
use App\lib\View;
use App\model\Customers;
use App\lib\Controller;
use App\lib\Pagination;

class Customer extends Controller
{
   public function index(){

       //var_dump($_GET);die();

       $limit=Pagination::limit;

       if (isset($_GET['pageno'])){
           $pageNo=$_GET['pageno'];
       }
       if (isset($pageNo) && $pageNo > 0){
           $start=($_GET['pageno'] -1) * $limit;
       }
       else{
           $pageNo=1;
           $start=0;
       }
       $customers=Customers::getALL($start,$limit);
       $data['customers']=$customers;

       $totalPages=Customers::getTotalPages();

       $pagination = new Pagination();
       $pagination->total = $totalPages;
       $pagination->page = $pageNo;
       $data['pagination'] = $pagination->render();

       $view = new View('index');
       $view->assign('data', $data);

   }
}