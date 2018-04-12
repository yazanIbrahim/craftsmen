<?php



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
<body id="home" ng-app="index" ng-controller="indexCtrl" ng-init="getPageNumbers()">

<!-- ============ PAGE LOADER START ============ -->

<div id="loader">
    <i class="fa fa-cog fa-4x fa-spin"></i>
</div>

<!-- ============ PAGE LOADER END ============ -->

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

<!-- ============ SLIDES START ============ -->

<div id="slider" class="sl-slider-wrapper">

    <div class="sl-slider" >

        <div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
            <div class="sl-slide-inner">
                <div class="bg-img bg-img-1"></div>
                <div class="tint"></div>
                <div class="slide-content">

                    <div class="row">

                        <div class="col-sm-12" >
                            <form ng-controller="resetPasswordCtrl">


                                <input type="password" class="form-control" ng-model="password.first" />
                                <input type="password" class="form-control" ng-model="password.second" />


                                <input value="Reset" class="btn btn-primary" ng-click="resetPassword('<?php echo $token;?>')"/>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>



</div>

<!-- ============ SLIDES END ============ -->

<!-- ============ JOBS START ============ -->

<?php







?>







<!-- ============ LOGIN START ============ -->

<?php

include "includes/login.php";
?>

<!-- ============ LOGIN END ============ -->

<!-- ============ REGISTER START ============ -->






<!-- ============ REGISTER END ============ -->

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


</body>
</html>