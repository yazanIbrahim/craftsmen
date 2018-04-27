<?php
session_start();


include "includes/classes/Helper.php";
include "includes/classes/User.php";
include "includes/classes/craftsmen.php";
include "includes/classes/Dbc.php";
if (!isset($_SESSION['user_id']))
    Helper::redirect("index.php", 2);
else {

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
    <title><?php echo $craftsmen->getFirstName() . " " . $craftsmen->getSurName(); ?></title>
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
                  <a class="profile-pic" href="#"> <img src="images/<?php echo $craftsmen->getImage(); ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?php echo $craftsmen->getFirstName() . " " . $craftsmen->getSurName(); ?></b> </a>


                </h4> 
              </div>
              <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 f-r">
                <ol class="breadcrumb">
                  <li><a href="#"><?php echo $craftsmen->getBio() ?></a></li>
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

                        <img width="100%" alt="" src="images/<?php echo $craftsmen->getImage(); ?>" id="previewImg">








                        <input id="file-input" type="file" onchange="previewFile()" style="display:none"/>

                      </div>
                    </label>
                  </div>
                  <div class="user-btm-box">
                    <div class="col-sm-12 offset-4 text-center">
                      <button class="btn btn-primary myBtn-primary " onclick="upload()">upload</button>
                      <div class="alert alert-success text-center" id="success-alert" >Upload Done</div>
                      <div class="alert alert-danger text-center" id="danger-alert">Upload Failed</div>
                    </div>

                  </div>

                  <div class="alert alert-danger" class="imageUploadMsg" style="display:none"></div>
                </div>
              </div>
              <div class="col-md-8 col-xs-12">
                <div class="white-box">
                  <form class="form-horizontal form-material" id= "craftmenUpdate" name="craftmenUpdate">


                    <div class="form-group">
                      <label class="col-md-12">الاسم الأول</label>
                      <div class="col-md-12">

                        <input type="text" placeholder="" class="form-control form-control-line" name="firstName" ng-model="updateInfo.firstName" ng-pattern="regex.firstName" > </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.firstNameError" >{{error.firstNameError}}</div>

                    </div>
                    <div class="form-group">
                      <label class="col-md-12">اسم العائلة</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" name="surName" ng-model="updateInfo.surName" pattern="" >
                      </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.surNameError">{{error.surNameError}}</div>

                    </div>

                    <div class="form-group">
                      <label for="example-email" class="col-md-12">البريد الالكتروني</label>
                      <div class="col-md-12">
                        <input type="email" placeholder="" class="form-control form-control-line" name="email" ng-model="updateInfo.email" id="example-email" pattern="" > </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.emailError" >{{error.emailError}}</div>

                    </div>
                    <div class="form-group">
                      <label for="example-email" class="col-md-12">اسم المستخدم</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" name="userName" ng-model="updateInfo.userName" pattern="" > </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.userNameError" >{{error.userNameError}}</div>

                    </div>



                    <div class="form-group">
                      <label class="col-md-12">رقم الهاتف</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" ng-model="updateInfo.mobile"ng-pattern="regex.mobile"> </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.mobileError" >{{error.mobileError}}</div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">الوصف</label>
                      <div class="col-md-12">
                        <textarea rows="5" ng-model="updateInfo.bio" placeholder= "" class="form-control form-control-line"></textarea>

                      </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.bio">{{error.bio}}</div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-12">المهنة</label>
                      <div class="col-sm-12">
                        <select ng-model="updateInfo.craft" class="form-control form-control-line">
                          <option selected="selected">{{craftsmenPlaceHolder.craft}}</option>
                          <option>كهربجي</option>
                          <option>حداد</option>
                          <option>نجار</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-12">المدينة</label>
                      <div class="col-sm-12">
                        <select ng-model="updateInfo.city"class="form-control form-control-line">
                          <option selected="selected">{{craftsmenPlaceHolder.city}}</option>
                          <option>عمان</option>
                          <option>الزرقاء</option>
                          <option>الاشرفية واقطع</option>
                          <option>دارنا</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button class="myBtn-primary" ng-click="update()">Update</button>
                      </div>
                    </div>

                    <div class="alert alert-danger" ng-show="updateMsgFlag">{{updateMsg}}</div>
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

    </body>

  </html>
