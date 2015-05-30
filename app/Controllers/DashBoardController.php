<?php
/**
 * Created by PhpStorm.
 * User: Tam Tran
 * Date: 5/30/2015
 * Time: 11:20 AM
 */

namespace Controllers;


use Models\ReportModel;

class DashBoardController extends BaseController implements IBaseController {
    public function __construct()
    {
        parent::__construct();
        $this->model = new ReportModel();
    }

    public function indexAction()
    {
        $totalRecord = $this->model->listReport(0,10,1);
        $this->template->assign('totalreport',$totalRecord);
        return $this->template->fetch('dashboard/index.tpl');
    }
} 