<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>FlatLab - Flat & Responsive Bootstrap Admin Template</title>

    <!-- Bootstrap core CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/css/bootstrap-reset.css" rel="stylesheet">
    
    <!--external css-->
    <link href="public/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="public/css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="public/css/style.css" rel="stylesheet">
    <link href="public/css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
<!--header start-->
<header class="header white-bg">
 <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
 </div>
<!--logo start-->
<a href="index.php?controller=dashboard&action=index" class="logo">Toggle <span>navigation</span></a>
<!--logo end-->

<div class="top-nav ">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        {if $typeUser=='admin'}


            <li>

                <label><h4>Total Commission:</h4></label>

                <input type="text" readonly="" value="{if isset($sum)}{$sum|round:"2"} €{/if}" />


            </li>
        {/if}

        {if $typeUser!='admin'}


                        <li>

                            <label><h4>Total Commission:</h4></label>

                            <input size="10" type="text" readonly="" value="{if isset($sum)}{$sum|round:"2"} €{/if}" />

                            <label><h4>Point:</h4></label>

                            <input size="5" type="text" readonly="" value="{if $report->point > 0}{$report->point}{else}0{/if}" />


                        </li>

        {/if}

        <li class="dropdown ">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="public/img/avatar-mini.jpg">
                <span class="username">{if !empty($user)}{$user}{/if}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <div class="log-arrow-up"></div>
                <li><a data-toggle="modal" href="index.php?controller=user&action=changepassworduser"><i class="fa fa-cog"></i> Change Password</a></li>
                <li><a href="index.php?controller=user&action=logout"><i class="fa fa-key"></i> Log Out</a></li>
            </ul>
        </li>

    
        <!-- user login dropdown end -->
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li>
                <a class="active" href="index.php?controller=dashboard&action=index">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             <li>
                <a href="index.php?controller=report&action=index">
                    <i class="fa fa-book"></i>
                    <span>Reports</span>
                </a>
            </li>
             <li>
                <a href="index.php?controller=product&action=index">
                    <i class="fa fa-tasks"></i>
                    <span>Products</span>
                </a>
            </li>
            
             <li>
                <a href="index.php?controller=productzanox&action=index">
                    <i class="fa fa-tasks"></i>
                    <span>Products Zanox</span>
                </a>
            </li>
            <li>
                <a href="index.php?controller=program&action=index">
                    <i class="fa fa-tasks"></i>
                    <span>Programs</span>
                </a>
            </li>
            
            <li>
                <a href="index.php?controller=programzanox&action=index">
                    <i class="fa fa-tasks"></i>
                    <span>Programs Zanox</span>
                </a>
            </li>
            
            <li class="sub-menu dcjq-parent-li">
                <a href="javascript:;" class="dcjq-parent">
                    <i class="fa fa-book"></i>
                    <span>Accounts &amp; Users</span>
                    <span class="dcjq-icon"></span></a>
                <ul class="sub" style="overflow: hidden; display: block;">
                    {if !empty($type) && $type=='admin'}
                        <li><a href="index.php?controller=account&action=index">Accounts List</a></li>
                    {/if}

                    <li><a href="index.php?controller=user&action=index">Users List</a></li>

                </ul>
            </li>

            
            <!--multi level menu end-->

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
{$content}
<!--main content end-->
<!--footer start-->
<footer class="site-footer">
    <div class="text-center">
        2013 &copy; FlatLab by VectorLab.
        <a href="#" class="go-top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
</footer>
<!--footer end-->
</section>

<!-- js placed at the end of the document so the pages load faster -->
<script src="public/js/jquery.js"></script>
<script src="public/js/jquery-1.8.3.min.js"></script>
<script src="public/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="public/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="public/js/jquery.scrollTo.min.js"></script>
<script src="public/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="public/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="public/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="public/js/owl.carousel.js" ></script>
<script src="public/js/jquery.customSelect.min.js" ></script>
<script src="public/js/respond.min.js" ></script>

<!--common script for all pages-->
<script src="public/js/common-scripts.js"></script>

<!--script for this page-->
<script src="public/js/sparkline-chart.js"></script>
<script src="public/js/easy-pie-chart.js"></script>
<script src="public/js/count.js"></script>


</body>
</html>
