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

<?php
 include "profile-includes/head.php";
 ?>


<body ng-app="craftsmenProfileCommentsFetcher" ng-controller="craftsmenProfileCommentsFetcherCtrl" ng-init="getComments(0)">
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
