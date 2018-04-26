<?php


require_once "includes/classes/Helper.php";
 if(isset($_GET['token'])){

     $token = filter_input(INPUT_GET,'token',FILTER_SANITIZE_STRING);
    // $userName = filter_input(INPUT_GET,'username',FILTER_SANITIZE_STRING);




 }ELSE{
     // KICK HIM OUT
     Helper::redirect("index.php",5);

 }


?>
<!DOCTYPE html>
<html>
<?php
include "includes/head.php";
?>
<body ng-app="index" ng-controller="indexCtrl" ng-init="getPageNumbers()">
<!-- ============ NAVBAR START ============ -->

        <?php

        include "includes/sideNav.php";
        ?>

		<!-- ============ NAVBAR END ============ -->

		<!-- ============ HEADER START ============ -->

        <?php
        include "includes/header.php";
        ?>


		<!-- ============ HEADER END ============ -->

<!-- ============ RESET PASSWORD END ============ -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="myPanel">
                <div class="panel-body">
                    <div class="text-center">
                        <h3><i class="fa fa-lock fa-4x"></i></h3>
                        <h3 class="text-center"> تغيير كلمة السر</h3>
                        <div class="panel-body">
                            <form ng-controller="resetPasswordCtrl">

                                <label>ادخال كلمة سر</label>
                                <input type="password" class="form-control" ng-model="password.first" />
                                <label>اعادة ادخال كلمة السر</label>
                                <input type="password" class="form-control" ng-model="password.second" />


                               <button class="btn btn-primary forget-btn" value="Reset" ng-click="resetPassword('<?php echo $token;?>')">تغيير</button>

                            </form>
                        </div> 
                    </div>
                </div>
            </div>
        </div>                       
    </div>
</div>


<!-- ============ FORGET PASSWORD END ============ -->
<!-- ============ LOGIN START ============ -->

        <?php

            include "includes/login.php";
        ?>

<!-- ============ LOGIN END ============ -->

<script src="js/controllers/indexCtrl.js"></script>

<script src="js/controllers/loginCtrl.js"></script>

<script src="js/controllers/forgetPasswordCtrl.js"></script>

<script src="js/controllers/resetPasswordCtrl.js"></script>
<!-- Modernizr Plugin -->
<script src="js/modernizr.custom.79639.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery-1.11.2.min.js"></script>

<!-- Bootstrap Plugins -->
<script src="js/bootstrap.min.js"></script>

<!-- Retina Plugin -->
<script src="js/retina.min.js"></script>

<!-- ScrollReveal Plugin -->
<script src="js/scrollReveal.min.js"></script>

<!-- Flex Menu Plugin -->
<script src="js/jquery.flexmenu.js"></script>

<!-- Slider Plugin -->
<script src="js/jquery.ba-cond.min.js"></script>
<script src="js/jquery.slitslider.js"></script>

<!-- Carousel Plugin -->
<script src="js/owl.carousel.min.js"></script>

<!-- Parallax Plugin -->
<script src="js/parallax.js"></script>

<!-- Counterup Plugin -->
<script src="js/jquery.counterup.min.js"></script>
<script src="js/waypoints.min.js"></script>

<!-- No UI Slider Plugin -->
<script src="js/jquery.nouislider.all.min.js"></script>

<!-- Bootstrap Wysiwyg Plugin -->
<script src="js/bootstrap3-wysihtml5.all.min.js"></script>

<!-- Flickr Plugin -->
<script src="js/jflickrfeed.min.js"></script>

<!-- Fancybox Plugin -->
<script src="js/fancybox.pack.js"></script>

<!-- Magic Form Processing -->
<script src="js/magic.js"></script>

<!-- jQuery Settings -->
<script src="js/settings.js"></script>

<script src="js/dropdownMenu.js"></script>
<script src="profile-js/stars-rating.js"></script>


</body>
</html>