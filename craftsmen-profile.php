<?php
    session_start();
    //echo $_SESSION['user_id'];
    include "includes/classes/Helper.php";
    include "includes/classes/User.php";
    include "includes/classes/craftsmen.php";
    include "includes/classes/Dbc.php";
    if(!isset($_SESSION['user_id']) ||  $_SESSION['userType'] == 0){
        Helper::redirect("index.php",2);
    }elseif(isset($_SESSION['userType']) == 1){

        $db = new DBC();
        $db = $db->getConn();

        $craftsmen = new craftsmen($db);

        $craftsmen->setUserId($_SESSION['user_id']);

        $craftsmen->retrieveData($_SESSION['user_id']);

        //var_dump($craftsmen->getImage());
    }


?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <!-- Resources am charts -->
    <style>
        #chartdiv {
            width	: 100%;
            height	: 500px;
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title><?php echo $craftsmen->getFirstName()." ".$craftsmen->getSurName(); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
    <!-- toast CSS -->
    <link href="plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- morris CSS -->
    <link href="plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="profile-css/animate.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="profile-css/style.css" rel="stylesheet">
    <!-- color CSS -->
    <link href="profile-css/colors/blue-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>









<![endif]-->
</head>

<body ng-app="craftsmenProfile" ng-controller="craftsmenProfileCtrl">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div class="top-left-part"><a class="logo" href="index.php"><b><img src="plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs">Craftsmen</span></a></div>
               
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="includes/logout.php"><b> Logout</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <div class="navbar-default sidebar col-sm-push-10" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li style="padding: 10px 0 0;">
                        <a href="craftsmen-profile.php" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">الصفحة الشخصية</span></a>
                    </li>
                    <li>
                        <a href="profile.php" class="waves-effect"><i class="fa fa-user fa-fw" aria-hidden="true"></i><span class="hide-menu">تعديل</span></a>
                    </li>
                    <li>
                        <a href="comments-view.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">عرض التعليقات</span></a>
                    </li>
                     <li>
                        <a href="updatePassword.php" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">تغيير كلمة السر</span></a>
                    </li>
                    
                </ul>
                <div class="center p-20">
                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 f-r">
                        <h4 class="page-title">
                            <a class="profile-pic" href="#"> <img src="images/<?php echo $craftsmen->getImage();?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $craftsmen->getFirstName()." ".$craftsmen->getSurName(); ?></b> </a>
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" aria-valuenow="5"
                                     aria-valuemin="0" aria-valuemax="100" id="rate">
                                    <span class="sr-only">70% Complete</span>
                                </div>
                            </div>
                            <p>{{rate}}</p>
                        </h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 f-r">
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $craftsmen->getBio()?></a></li>
                              
                        </ol>
                           
                    </div>
                    
                    <!-- /.col-lg-12 -->
                </div>
                <!-- row -->
                <div class="row">
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-10 col-sm-10 col-xs-10"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb"><?php echo $craftsmen->getCity();?></h4> </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                   <i class="fa fa-building" style="font-size:40px"></i>
                                </div>
                               <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-10 col-sm-10 col-xs-10"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb"><?php echo $craftsmen->getMobile();?></h4> </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                   <i class="fa fa-mobile-phone" style="font-size:40px"></i>
                                </div>
                               <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!--col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <div class="col-in row">
                                <div class="col-md-10 col-sm-10 col-xs-10"> <i data-icon="E" class="linea-icon linea-basic"></i>
                                    <h4 class="text-muted vb"><?php echo $craftsmen->getCraft();?></h4> </div>
                                <div class="col-md-2 col-sm-2 col-xs-2">
                                   <i class="fa fa-wrench" style="font-size:40px"></i>
                                </div>
                               <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"> <span class="sr-only">40% Complete (success)</span> </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
                <!--row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <!-- Resources -->
                            <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
                            <script src="https://www.amcharts.com/lib/3/serial.js"></script>
                            <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
                            <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
                            <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
                            <div id="chartdiv"></div>
                            <script src="profile-js/chart.js"></script>
                        </div>
                    </div>
                </div>
                
                <!-- row -->

                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="col-lg-10 col-md-12 col-sm-12 footer text-center"> 2018 &copy; Craftsmen Admins</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->


    <script src="js/controllers/craftsmenProfieCtrl.js"></script>
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="profile-js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="profile-js/waves.js"></script>
    <!--Counter js -->
    <script src="plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="plugins/bower_components/morrisjs/morris.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="profile-js/custom.min.js"></script>
    <script src="profile-js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>







</body>

</html>
