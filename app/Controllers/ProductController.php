<?php
namespace Controllers;
use Controllers\BaseController;
use Controllers\IBaseController;
use Libraries\Pagination;
use Models\ProductModel;
class ProductController extends BaseController implements IBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProductModel();
    }
    public function indexAction()
    {

      if(isset($_REQUEST['search'])){
            $search=$_REQUEST['search'];
        }else{
            $search='';
        }

        if(isset($_POST['go'])){
            $search= $_POST['search']?$_POST['search']:'';
        }
       // echo $search; die();
        //$search= "";

      //  echo '<pre>'.print_r($totalRecord,true).'</pre>';die();

                 $totalRecord = $this->model->listProduct(1,10,1,$search);

                $limit = isset($_REQUEST['limit']) ?  $_REQUEST['limit'] : 10;
                //$page= isset($_REQUEST['page']) ?  $_REQUEST['page'] : 10;

                $Pagination = new Pagination($limit,'index.php?controller=product&action=index&search='.$search);//,$base_url

                $totalPages = $Pagination->totalPages($totalRecord);
                $limit = (int)$Pagination->limit;
                $start = (int)$Pagination->start();
                $page= ($start/$limit)+1;
               // echo $page."-".$limit;die();
                $result = $this->model->listProduct($page,$limit,0,$search);
               // echo '<pre>'.print_r($result,true).'</pre>';die();
                $listPage= $Pagination->listPages($totalPages);

                $this->template->assign('products',$result);
                $this->template->assign('search',$search);
                $this->template->assign('limit',$limit);
                $this->template->assign('totalrecords',$totalRecord);
                $this->template->assign('totalpages',$totalPages);
                $this->template->assign('listPage',$listPage);
        return $this->template->fetch('product/index.tpl');
    }
}
