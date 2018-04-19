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
    <title>Pixel Admin - Responsive Admin Dashboard Template build with Twitter Bootstrap</title>
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
                <div class="top-left-part"><a class="logo" href="index.php"><b><img src="plugins/images/pixeladmin-logo.png" alt="home" /></b><span class="hidden-xs"><img src="plugins/images/pixeladmin-text.png" alt="home" /></span></a></div>
                <ul class="nav navbar-top-links navbar-left m-l-20 hidden-xs">
                    <li>
                        <form role="search" class="app-search hidden-xs">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a>
                        </form>
                    </li>
                </ul>
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <a class="profile-pic" href="includes/logout.php"><b>Logout</b> </a>
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
                        <a href="basic-table.html" class="waves-effect"><i class="fa fa-table fa-fw" aria-hidden="true"></i><span class="hide-menu">عرض الطلبات</span></a>
                    </li>
                    <li>
                        <a href="fontawesome.html" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i><span class="hide-menu">Icons</span></a>
                    </li>
                    <li>
                        <a href="map-google.html" class="waves-effect"><i class="fa fa-globe fa-fw" aria-hidden="true"></i><span class="hide-menu">Google Map</span></a>
                    </li>
                    <li>
                        <a href="blank.html" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i><span class="hide-menu">Blank Page</span></a>
                    </li>
                    <li>
                        <a href="404.html" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i><span class="hide-menu">Error 404</span></a>
                    </li>
                </ul>
                <div class="center p-20">
                    <span class="hide-menu"><a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Upgrade to Pro</a></span>
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
                            <div class="user-bg"> <img width="100%" alt="user" src="plugins/images/large/img1.jpg">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <form>
                                            <div class="input-group">
                                                <input type="file" id="imageInput" class="form-control" name="image" />
                                                <button id="upload">upload</button>
                                            </div>
                                        </form>



                                        <a href=""><img src="" class="thumb-lg img-circle" alt="img" id="imagePreview"></a>
                                        <h4 class="text-white">User Name</h4>
                                        </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-purple"><i class="ti-facebook"></i></p>
                                    <h1>258</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-blue"><i class="ti-twitter"></i></p>
                                    <h1>125</h1> </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <p class="text-danger"><i class="ti-dribbble"></i></p>
                                    <h1>556</h1> </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" id= "craftmenUpdate" name="craftmenUpdate">
                                {{fullName}}
                                
                                <div class="form-group">
                                    <label class="col-md-12">الاسم الأول</label>
                                    <div class="col-md-12">

                                    <input type="text" placeholder="{{craftsmenPlaceHolder.first_name}}" class="form-control form-control-line" name="firstName" ng-model="updateInfo.firstName" ng-pattern="" > </div>
                                         <div class="alert alert-danger"  ng-show="updateErrorFlags.firstNameError" >{{error.firstNameError}}</div>
                                         input valid? = <code>{{craftmenUpdate.firstName.$valid}}</code><br>
                                </div>
                                 <div class="form-group">
                                    <label class="col-md-12">اسم العائلة</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="{{craftsmenPlaceHolder.last_name}}" class="form-control form-control-line" name="surName" ng-model="updateInfo.surName"ng-pattern="" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.surNameError">{{error.surNameError}}</div>
                                        input valid? = <code>{{craftmenUpdate.surName.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">البريد الالكتروني</label>
                                    <div class="col-md-12">
                                        <input type="email" placeholder="{{craftsmenPlaceHolder.email}}" class="form-control form-control-line" name="email" ng-model="updateInfo.email" id="example-email" ng-pattern="" > </div>
                                        <div class="alert alert-danger" ng-show="updateErrorFlags.emailError" >{{error.emailError}}</div>
                                        input valid? = <code>{{craftmenUpdate.email.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">اسم المستخدم</label>
                                    <div class="col-md-12">
                                        <input type="password" placeholder="{{craftsmenPlaceHolder.username}}" class="form-control form-control-line" name="userName" ng-model="updateInfo.userName" ng-pattern="" > </div>
                                        <div class="alert alert-danger" ng-show="updateErrorFlags.userNameError" >{{error.userNameError}}</div>
                                        input valid? = <code>{{craftmenUpdate.userName.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر السابقة</label>
                                    <div class="col-md-12">
                                        <input type="password"  value="password" class="form-control form-control-line" name="passwordo" ng-model ="updateInfo.passwordo" ng-pattern="" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.passwordoError">{{error.passwordoError}}</div>
                                        input valid? = <code>{{craftmenUpdate.password1.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر الجديدة</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password1" ng-model ="updateInfo.password1" ng-pattern="" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.password1Error">{{error.password1Error}}</div>
                                        input valid? = <code>{{craftmenUpdate.password1.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">اعادة كلمة السر</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password2" ng-model="updateInfo.password2" ng-pattern="" > </div>
                                        <div class="alert alert-danger"  ng-show="updateErrorFlags.password1Error">{{error.password1Error}}</div>
                                        input valid? = <code>{{craftmenUpdate.password2.$valid}}</code><br>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Phone No</label>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="123 456 7890" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">الوصف</label>
                                    <div class="col-md-12">
                                        <textarea rows="5" placeholder= "{{craftsmenPlaceHolder.bio}}" class="form-control form-control-line"></textarea>
                                    </div>
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
                                        <button class="btn btn-success" ng-click="update()">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Pixel Admin brought to you by wrappixel.com </footer>
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
