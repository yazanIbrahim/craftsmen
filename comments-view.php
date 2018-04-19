<?php
    session_start();
    //echo $_SESSION['user_id'];
    include "includes/classes/Helper.php";
    include "includes/classes/User.php";
    include "includes/classes/craftsmen.php";
    include "includes/classes/Dbc.php";

if(!isset($_SESSION['user_id'])){
    Helper::redirect("index.php",5,"not allowed");
}elseif(isset($_SESSION['userType'])){

        $db = new DBC();
        $db = $db->getConn();

        $craftsmen = new craftsmen($db);

        $craftsmen->setUserId($_SESSION['user_id']);

        $data = $craftsmen->retrieveData($_SESSION['user_id']);

    }

?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <!-- Resources am charts -->
    <style>
        #chartdiv {
            width   : 100%;
            height  : 500px;
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

<body ng-app="craftsmenProfileCommentsFetcher" ng-controller="craftsmenProfileCommentsFetcherCtrl" ng-init="getComments(0)">
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
                    
                </ul>
                <div class="center p-20">
                </div>
            </div>
        </div>
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">التعليقات</h3>
                            <div class="comment-center">
                                <div class="comment-body" ng-repeat="x in comments" style="text-align: right">
                                    <div class="user-img"> <img src="images/pp.png" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>{{" "+x.first_name+" "+x.last_name+" "}}</h5> <span class="mail-desc">{{x.comment}}
                                        </span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">{{x.comment_date}}</span></div>
                                </div>
                            </div>


                            <div class="comment-num-page">
                                <ul class="pagination">
                            <li><a href="#" ng-repeat="x in numOfComments" ng-click="getComments(x)">{{x}}</a></li>


                        </ul>

                            </div>

                               
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2018 &copy; Craftsmen </footer>
        
        <!-- /#page-wrapper -->
    
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="profile-js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="profile-js/waves.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="profile-js/custom.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>

        <script src="js/controllers/craftsmenProfileCommentsFetcherCtrl.js"></script>
</body>

</html>
