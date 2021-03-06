<?php
 session_start();
    //echo $_SESSION['user_id'];

    include "includes/classes/User.php";
    include "includes/classes/Helper.php";
              

    include "includes/classes/craftsmen.php";
    include "includes/classes/Dbc.php";
     $db = new Dbc();
     $db = $db->getConn();
   
if(isset($_GET['user'])){

    $user = filter_input(INPUT_GET,'user',FILTER_SANITIZE_STRING);
    // check if there is a craftsmen with this username
    $stmt = "SELECT user_id from masteruser where username = ?";
    $query = $db->prepare($stmt);
    $query->execute(array($user));
    //echo "rw couuuuunt: ".$query->rowCount();
    if($query->rowCount() == 0 ){
        Helper::redirect("index.php",2,"no user with such username");

    }elseif(isset($_SESSION['user_id']) && $_SESSION['userType'] == 1){
        
        //check if there is loggend in user and that user is a crafstmen

       if($query->fetch(PDO::FETCH_ASSOC)['user_id'] == $_SESSION['user_id']){
           
           //check if the craftsmen trying to view his profile as enduser if so prevent him and 
           //send him to his official profile page
           //redirect him to his profile
           Helper::redirect("craftsmen-profile.php",3,"Redirect to your profile");
       }else{
           //if the craftsmen logeed in is trying vuew another crafsmen profile prevent him as well :)
                      Helper::redirect("index.php",3," You are not allowed to view this page since you are craftsmen ");

       }
      
   }else{

//echo "loop";
       //if the logged in user is an enduser allow him and fethch the requested crasftsmne profile info






   }
     
     
            
}else{
    echo "NOT ALLOWED";
    header("location:index.php");
}

?>


<!DOCTYPE html>
<html dir="rtl" lang="ar">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    
    <title>User</title>
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

<body ng-app="commentApp" ng-controller="commentCtrl" ng-init="getCraftsmenInfoOnLoad('<?php echo $user;?>')">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
      <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="fa fa-bars"></i></a>
                <div style="float:left;"><a href="index.php"><img src="images/logo.png" width="120px" height="40px" alt="Home"></a></div>
               
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li>
                        <?php

                        if(isset($_SESSION['user_id'])) {


                            ?>
                            <a class="profile-pic" href="includes/logout.php"><b> Logout</b></a>
                            <?php

                        }else {


                            ?>
                            
                                
                                <a style=" display: inline-block;" href = "signup.php"><b> تسجيل </b></a>
                        <a style=" display: inline-block;" href = "index.php"><b> تسجيل الدخول </b></a>
                            
                            <?php

                        }
                        ?>

                    </li>
                </ul>
            </div>
            
            
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- Left navbar-header -->
        <!--<div class="navbar-default sidebar col-sm-push-10" role="navigation" style="background-color: #edf1f5">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <div>
                    <a href="#">
                        <img src="http://placehold.it/220x300.jpg" alt="Featured Job" class="img-responsive">
              
                    </a>
                                         <hr/>

                </div>
                 <div>
                    <a href="#">
                        <img src="http://placehold.it/220x300.jpg" alt="Featured Job" class="img-responsive">
                        
                    </a>
                     <hr/>
                </div>
                 <div>
                    <a href="#">
                        <img src="http://placehold.it/220x300.jpg" alt="Featured Job" class="img-responsive">
              
                    </a>
                </div>
                 <div>
                    <a href="#">
                        <img src="http://placehold.it/220x300.jpg" alt="Featured Job" class="img-responsive">
              
                    </a>
                </div>
                
            </div>
        </div>-->
        <!-- Left navbar-header end -->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 f-r">
                        <h4 class="page-title">
                            <a class="profile-pic" href="#"> <img src="{{'images/'+craftsmenInfo.craftsmenInfo.image_path}}" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">{{craftsmenInfo.craftsmenInfo.firstName}}</b> </a>
                            <div class="row lead stars">
                                <div id="stars" class="starrr">

                                </div>

                            </div>

                        </h4>

                    </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 f-r">
                        <ol class="breadcrumb">
                            <li><a href="#">{{craftsmenInfo.craftsmenInfo.bio}}</a></li>
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
                                    <h4 class="text-muted vb">{{craftsmenInfo.craftsmenInfo.city}}</h4> </div>
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
                                    <h4 class="text-muted vb">{{craftsmenInfo.craftsmenInfo.mobile}}</h4> </div>
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
                                    <h4 class="text-muted vb">{{craftsmenInfo.craftsmenInfo.craft}}</h4> </div>
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

               
                 <!-- row -->
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">اخر التعليقات</h3>
                            <div class="comment-center">
                                <div class="comment-body" ng-repeat="(key,value) in craftsmenInfo.comments" style="text-align: right">
                                    <div class="user-img"> <img src="images/pp.png" alt="user" class="img-circle"></div>
                                    <div class="mail-contnet">
                                        <h5>{{" "+value.first_name+" "+value.last_name+" "}}</h5> <span class="mail-desc">{{value.comment}}
                                        </span><a href="javacript:void(0)" class="action"><i class="ti-close text-danger"></i></a> <a href="javacript:void(0)" class="action"><i class="ti-check text-success"></i></a><span class="time pull-right">{{value.comment_date}}</span></div>
                                </div>
                            </div>


                            <div class="comment-num-page">
                                <ul class="num-of-pages" ng-repeat="x in pages">
                                    <li ng-click="getComments(x)"><a class="page" href="" >{{x}}</a></li>

                                </ul>
                            </div>

                                <div class="comment-body comment-width">
                                    <form class="form-inline comment-width" id="userComment" name="userComment">
                                            <div class="form-group comment-style">
						<label class="sr-only" for="newsletter-email">Email address</label>
						<textarea rows="2" cols="50" name="comment" ng-model="commentInfo.comment" class="form-control comment-width" placeholder="your comment"></textarea>
                                            </div>
        				<button type="submit" style="background-color:#14b1bb;border:0px;" class="btn btn-primary" ng-click="comment(username)">تعليق</button>

                                        <div class="alert alert-success" ng-show="msg.show">{{msg.msg}}</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="col-lg-10 col-md-12 col-sm-12 footer text-center"> 2018 &copy; Craftsmen </footer>
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

    <!-- Custom Theme JavaScript -->
    <script src="profile-js/custom.min.js"></script>
    <script src="profile-js/dashboard1.js"></script>
    <script src="plugins/bower_components/toast-master/js/jquery.toast.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <script src="js/controllers/commentCtrl.js"></script>
    <script src="profile-js/stars-rating.js"></script>
    
</body>

</html>
