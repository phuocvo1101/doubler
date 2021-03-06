<?php
session_start();
use Configs\Routing;
use Models\BaseModel;
define('APPLICATION_DIRECTORY',dirname(__FILE__));
define('APPLICATION_VIEW',APPLICATION_DIRECTORY.'/app/Views/');
define('PATH_CACHE',APPLICATION_DIRECTORY.'/app/caches');

define('PATH_SERVERNAME','http://'.$_SERVER['SERVER_NAME'].'/');
define('PATH_SERVER',$_SERVER['DOCUMENT_ROOT'].'/');

define('PATH_CSS',PATH_SERVERNAME.'app/view/css/');
define('PATH_JS',PATH_SERVERNAME.'app/view/js/');
define('PATH_IMAGES',PATH_SERVERNAME.'app/images/');


require_once 'app/start.php';


$routing = new Routing();
global $smarty;
$smarty = new Smarty();
$smarty->template_dir = APPLICATION_VIEW;
$smarty->compile_dir = PATH_CACHE.'/templates_c';
$smarty->cache_dir = PATH_CACHE;

list($content,$layout) = $routing->getRouting();


$smarty->assign('PATH_CSS',PATH_CSS);
$smarty->assign('PATH_JS',PATH_JS);
$smarty->assign('PATH_IMAGES',PATH_IMAGES);
if(isset($_SESSION['username'])) {
    $smarty->assign('user',$_SESSION['username']);
    $smarty->assign('type',$_SESSION['type']);
    $smarty->assign('typeUser',$_SESSION['type']);
    $model= new \Models\BaseModel();
    if($_SESSION['type']=='admin'){
        $sum= $model->sumCommissionReport();

    }else{
        $sum= $model->sumCommissionReport($_SESSION['user_id']);
        $report= $model->listReportId();
        $smarty->assign('report',$report);
    }
    $smarty->assign('sum',$sum);


}
$smarty->assign('content',$content);
$smarty->display($layout);