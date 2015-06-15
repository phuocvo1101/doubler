<?php
namespace Controllers;

use Controllers\BaseController;
use Controllers\IBaseController;
use Libraries\Pagination;
use Models\ProgramModel;

class ProgramController extends BaseController implements IBaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new ProgramModel();
    }

    public function indexAction()
    {

        if (isset($_REQUEST['search'])) {
            $search = $_REQUEST['search'];
        } else {
            $search = '';
        }
        if (isset($_POST['go'])) {
            $search = $_POST['search'] ? $_POST['search'] : '';
        }
        $result = $this->model->listProductProgram($search);
        $this->template->assign('programs', $result);
        $this->template->assign('search', $search);
        $this->template->assign('userid',$_SESSION['user_id']);
        return $this->template->fetch('program/index.tpl');
    }
}
