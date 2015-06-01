<?php /* Smarty version 3.1.24, created on 2015-05-31 01:26:55
         compiled from "/var/www/workspace/tradedoubler/app/Views/report/index.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:565690908556a00efeca504_01756244%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed39e8a9f0f3e439f5fe196980ef4d7d06dfb866' => 
    array (
      0 => '/var/www/workspace/tradedoubler/app/Views/report/index.tpl',
      1 => 1433010408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '565690908556a00efeca504_01756244',
  'variables' => 
  array (
    'search' => 0,
    'reports' => 0,
    'item' => 0,
    'listPage' => 0,
    'limit' => 0,
    'totalrecords' => 0,
    'totalpages' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_556a00f0321125_03658377',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_556a00f0321125_03658377')) {
function content_556a00f0321125_03658377 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '565690908556a00efeca504_01756244';
?>
<?php echo '<script'; ?>
 type="text/javascript">
    function answers()
    {
        var selectedanswer=document.getElementById("recordlimit").value;
        var frm = document.getElementById("frm");
        frm.action = "index.php?controller=report&action=index&limit="+selectedanswer;
        frm.submit();
    }
<?php echo '</script'; ?>
>
<form id="frm" action="index.php?controller=order&action=index" method="post">

    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

        <div class="row">
            <div class="col-xs-6 col-sm-12">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Report</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 placeholder">
                <h1 class="page-header" align="left"><i class="fa fa-shopping-cart"></i><span>  Reports</span></h1>
            </div>
            <div class="col-sm-2"></div>

            <div class="col-sm-4">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" value="<?php if (isset($_smarty_tpl->tpl_vars['search']->value)) {
echo $_smarty_tpl->tpl_vars['search']->value;
}?>" placeholder="Search for...">
                  <span class="input-group-btn">
                    <input class="btn btn-default" type="submit" id="go" name="go" value="Go!" />
                  </span>
                </div>
            </div>

        </div>

        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Date#</th>
                    <th>Order Number</th>
                    <th>Programma Nome
                    </th>
                    <th>Merchant</th>
                    <th>Amount
                    </th>
                    <th>Commission
                    </th>
                    <th>Programma Prepayment Status
                    </th>
                    <th>Time of visit
                    </th>
                    <th>Time In session
                    </th>
                    <th>Time Last modified
                    </th>
                    <th>Evento Nome
                    </th>
                    <th>Reason
                    </th>
                    <th>Sito Nome
                    </th>
                    <th>Elem Grafico Nome
                    </th>


                </tr>
                </thead>
                <tbody>
                <?php if (isset($_smarty_tpl->tpl_vars['reports']->value)) {?>
                    <?php
$_from = $_smarty_tpl->tpl_vars['reports']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$foreach_item_Sav = $_smarty_tpl->tpl_vars['item'];
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->date;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->unique_id_ordernumber;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->programma_name;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->merchantId;?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->amount;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->commission;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->status;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->time_of_visit;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->time_in_session;?>

                            </td>
                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->time_last_modified;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->evento_name;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->reason;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->site_name;?>

                            </td>
                            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->elem_grafico_name;?>

                            </td>

                        </tr>
                    <?php
$_smarty_tpl->tpl_vars['item'] = $foreach_item_Sav;
}
?>
                <?php }?>

                </tbody>
                <tr>
                    <td colspan="5" align="right">

                        <ul class="pagination" align="center">

                            <?php if (isset($_smarty_tpl->tpl_vars['listPage']->value)) {?>
                                <li><?php echo $_smarty_tpl->tpl_vars['listPage']->value;?>
</li>
                            <?php }?>
                        </ul>
                    </td>
                    <td colspan="9" align="center">
                        <div>
                            Page Size:
                            <select id="recordlimit" onchange="answers();">
                                <option <?php if (isset($_smarty_tpl->tpl_vars['limit']->value) && $_smarty_tpl->tpl_vars['limit']->value == 10) {?>selected="selected"<?php }?> value="10">10 </option>
                                <option <?php if (isset($_smarty_tpl->tpl_vars['limit']->value) && $_smarty_tpl->tpl_vars['limit']->value == 20) {?>selected="selected"<?php }?> value="20">20 </option>
                                <option <?php if (isset($_smarty_tpl->tpl_vars['limit']->value) && $_smarty_tpl->tpl_vars['limit']->value == 50) {?>selected="selected"<?php }?> value="50">50 </option>
                                <option <?php if (isset($_smarty_tpl->tpl_vars['limit']->value) && $_smarty_tpl->tpl_vars['limit']->value == 100) {?>selected="selected"<?php }?> value="100">100 </option>
                                <option <?php if (isset($_smarty_tpl->tpl_vars['limit']->value) && $_smarty_tpl->tpl_vars['limit']->value == $_smarty_tpl->tpl_vars['totalrecords']->value) {?>selected="selected"<?php }?> value="<?php echo $_smarty_tpl->tpl_vars['totalrecords']->value;?>
">All</option>
                            </select>
                            Total Record:<input type="text" size="2" value="<?php echo $_smarty_tpl->tpl_vars['totalrecords']->value;?>
" disabled="disabaled" />
                            Total Page:<input type="text" size="2" value="<?php echo $_smarty_tpl->tpl_vars['totalpages']->value;?>
" disabled="disabaled"/>
                        </div>

                    </td>
                </tr>
            </table>
        </div>

    </div>
</form><?php }
}
?>