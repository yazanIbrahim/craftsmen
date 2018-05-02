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

 <?php
 include "profile-includes/head.php";
 ?>

<body ng-app="craftsmenProfile" ng-controller="craftsmenProfileCtrl">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
        <!--Header-->
        <?php
        include "profile-includes/header.php";
        ?>
        
        <!--End Header-->
        <!--Left nav bar-->
        <?php
        include "profile-includes/sideNav.php";
        ?>
        <!--End left nav bar-->
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <?php
                include "profile-includes/info.php";
                ?>
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
