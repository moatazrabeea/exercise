<?php


namespace App\controller;

use App\common\Document;
use App\lib\View;
use App\model\Customers;
use App\lib\Controller;


class Customer extends Controller
{
   public function index(){

       $limit=20;

       if (isset($_GET['pageno'])){
           $pageNo=$_GET['pageno'];
       }
       if (isset($pageNo)){
           $start=($_GET['pageno'] -1) * $limit;
           $attchment['pageNo']=$pageNo;
       }
       else{
           $pageNo=1;
           $start=0;
           $attchment['pageNo']=1;
       }
      $customers=Customers::getALL($start,$limit);
      //$this->render('View/index',$customers);
      //return ($this->load_view($customers,true));
       $data['customers']=$customers;
         $totalPages=Customers::getTotalPages($limit);
//         var_dump($totalPages);die();
       $attchment['totalPages']=$totalPages;
          if ($pageNo > $attchment['totalPages']){
              $view = new View('404');
              exit();
          }
       //array_push($attchment,$customers);
       $data['attachment']=$attchment;
       //var_dump($customers);die();
       $view = new View('index');
       $view->assign('data', $data);

   }
}