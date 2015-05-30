<?php /* Smarty version 3.1.24, created on 2015-05-30 12:45:06
         compiled from "/var/www/workspace/tradedoubler/app/Views/dashboard/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:55022340455694e62135888_53039831%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '286668b62d1f507b93f5f36d02a96848bfe38a69' => 
    array (
      0 => '/var/www/workspace/tradedoubler/app/Views/dashboard/index.tpl',
      1 => 1432964616,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '55022340455694e62135888_53039831',
  'variables' => 
  array (
    'totalreport' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_55694e621bf269_23511534',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_55694e621bf269_23511534')) {
function content_55694e621bf269_23511534 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '55022340455694e62135888_53039831';
?>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="col-mod-12">

            <ul class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li>Dashboard</li>
            </ul>

            <h3 class="page-header"><i class="fa fa fa-dashboard"></i> Dashboard  </h3>
        </div>
    </div>


    <!-- Info Boxes -->
    <div class="row">
        <div class="col-md-4">
            <div class="info-box  bg-info  text-white">
                <div class="info-icon bg-info-dark">
                    <span class="glyphicon glyphicon-eye-open fa-4x" aria-hidden="true"></span>
                    <span class="pull-right"><h1><?php if (isset($_smarty_tpl->tpl_vars['totalreport']->value)) {
echo $_smarty_tpl->tpl_vars['totalreport']->value;
}?></h1></span>
                </div>
                <div class="info-details">
                    <h4>Report RECEIVED</h4>
                </div>
            </div>
        </div>

    </div>
</div><?php }
}
?>