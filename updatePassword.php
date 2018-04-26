<?php
    session_start();


    include "includes/classes/Helper.php";
    include "includes/classes/User.php";
    include "includes/classes/craftsmen.php";
    include "includes/classes/Dbc.php";
    if(!isset($_SESSION['user_id']))
        Helper::redirect("index.php",2);
    else{
        
        $db = new DBC();
        $db = $db->getConn();

        $craftsmen = new craftsmen($db);

        $craftsmen->setUserId($_SESSION['user_id']);

        $data = $craftsmen->retrieveData($_SESSION['user_id']);

    }


?>


<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../plugins/images/favicon.png">
    <title><?php echo $craftsmen->getFirstName()." ".$craftsmen->getSurName(); ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Menu CSS -->
    <link href<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <title>Pixel Admin - Responsive Admin Dashboard Template built with Twitter Bootstrap</title>
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

    <style>
        .image-upload > input
        {
            display: none;
        }
    </style>
<![endif]-->
</head>


<body ng-app="updateApp" ng-controller="updateCtrl">    <!-- Preloader -->
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
                            <a class="profile-pic" href="#"> <img src="plugins/images/users/varun.jpg" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $craftsmen->getFirstName()." ".$craftsmen->getSurName(); ?></b> </a>


                        </h4> 
                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 f-r">
                        <ol class="breadcrumb">
                            <li><a href="#"><?php echo $craftsmen->getBio()?></a></li>
                        </ol>
 
                    </div>
                 </div>
                    
                    <!-- /.col-lg-12 -->
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <div class="white-box">
                            <div class="user-bg">
                                <label for="file-input">
                                <div class="overlay-box">

                                    <img width="100%" alt="" src="images/pp.png" id="previewImg">








                                    <input id="file-input" type="file" onchange="previewFile()" style="display:none"/>

                                </div>
                                </label>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-sm-12 offset-4 text-center">
                                    <button class="btn btn-primary myBtn-primary " onclick="upload()">upload</button>
                                </div>
                                
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" id= "craftmenUpdate" name="craftmenUpdate">
                                {{fullName}}
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر السابقة</label>
                                    <div class="col-md-12">
                                        <input type="password"  value="password" class="form-control form-control-line" name="passwordo" ng-model ="updateInfo.passwordo" ng-pattern="regex.password1" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.passwordoError">{{error.passwordoError}}</div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر الجديدة</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password1" ng-model ="updateInfo.password1" ng-pattern="regex.password1" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.password1Error">{{error.password1Error}}</div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">اعادة كلمة السر</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password2" ng-model="updateInfo.password2" ng-pattern="regex.password2" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.password2Error">{{error.password1Error}}</div>
                                        
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="myBtn-primary" ng-click="update()">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="col-lg-10 col-md-12 col-sm-12 footer text-center"> 2018 &copy; Craftsmen Admins</footer>
        </div>
        <!-- /#page-wrapper -->
    </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="js/controllers/updateCtrl.js"></script>
<script src="js/controllers/imageUploadCtrl.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to Pixel admin',
            text: 'Use the predefined ones, or specify a custom position object.',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'info',
            hideAfter: 3500,
            stack: 6
        })
    });
  
    </script>
</body>

</html>