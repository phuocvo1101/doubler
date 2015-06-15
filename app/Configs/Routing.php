<?php
namespace Configs;


use Controllers\ReportController;
use Controllers\DashBoardController;
use Controllers\ProductController;
use Controllers\AccountController;
use Controllers\UserController;
use Controllers\ProgramController;

class Routing {
    protected  $baseController;
    protected  $content;
    public function __construct()
    {
        $this->baseController = null;
    }

    public function getRouting()
    {
        $layout='layout.tpl';
        if(isset($_GET["controller"]) && isset($_GET['action'])) {

            switch(strtolower($_GET["controller"])) {
                case "report":
                    $this->baseController = new ReportController();
                    break;
                case "product":
                    $this->baseController = new ProductController();
                    break;
                case "program":
                    $this->baseController = new ProgramController();
                    break;
                case "dashboard":
                    $this->baseController = new DashBoardController();
                    break;
                case "account":
                    $this->baseController = new AccountController();
                    break;
                case "user":
                    $this->baseController = new UserController();
                    break;
                default:
                    $this->baseController = new DashBoardController();
                    break;
            }
            switch(strtolower($_GET['action'])) {
                case 'index':
                    $this->content = $this->baseController->indexAction();
                    break;
                case 'view':
                    $this->content = $this->baseController->viewAction();
                    break;
                case 'active':
                    $this->content = $this->baseController->activeAction();
                    break;
                case 'edit':
                    $this->content = $this->baseController->editAction();
                    break;
                case 'delete':
                    $this->content = $this->baseController->deleteAction();
                    break;
                case 'create':
                    $this->content = $this->baseController->createAction();
                    break;
                case 'changepassword':
                    $this->content = $this->baseController->changePasswordAction();
                    break;
                case 'changepassworduser':
                    $this->content = $this->baseController->changePasswordUserAction();
                    break;
                case 'login':
                    $layout='loginlayout.tpl';
                    $this->content = $this->baseController->login();
                    break;
                case 'logout':
                    $this->content = $this->baseController->logout();
                    break;
                default:
                    $this->content =$this->baseController->indexAction();
                    break;
            }
        } else {
            $_GET['controller'] = 'dashboard';
            $_GET['action'] = 'index';
            $basecontroller = new DashBoardController();
            $this->content = $basecontroller->indexAction();
        }
        return array($this->content,$layout);
    }
}