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
<html dir="rtl" lang="ar">
<?php
 include "profile-includes/head.php";
 ?>


<body ng-app="updateApp" ng-controller="updateCtrl">    <!-- Preloader -->
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
                <div class="row bg-title">
               <h2>تغيير كلمة المرور</h2> 
              </div>
                    
                    <!-- /.col-lg-12 -->
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <form class="form-horizontal form-material" id= "craftmenUpdate" name="craftmenUpdate">
                                {{fullName}}
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر السابقة</label>
                                    <div class="col-md-12">
                                        <input type="password"  value="password" class="form-control form-control-line" name="passwordo" ng-model ="updatePass.passwordo" ng-pattern="regex.password1" > </div>
                                        <div class="alert alert-danger"  ng-show="updatePassErrorFlags.passwordoError">{{error.passwordoError}}</div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">كلمة السر الجديدة</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password1" ng-model ="updatePass.password1" ng-pattern="regex.password1" > </div>
                                        <div class="alert alert-danger"  ng-show="updatePassErrorFlags.password1Error">{{error.password1Error}}</div>
                                        
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">اعادة كلمة السر</label>
                                    <div class="col-md-12">
                                        <input type="password" value="password" class="form-control form-control-line" name="password2" ng-model="updatePass.password2" ng-pattern="regex.password2" > </div>
                                        <div class="alert alert-danger"  ng-show="updatePassErrorFlags.password2Error">{{error.password1Error}}</div>
                                        
                                </div>
                               
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="myBtn-primary" ng-click="updatePassword()">Update</button>
                                        <div class="alert alert-danger" ng-show="responseMsgFlag">{{responseMsg}}</div>
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
   
</body>

</html>
