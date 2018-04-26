<?php


?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<?php
 include "includes/head.php";
 ?>
 <body ng-app="index" ng-controller="indexCtrl">
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
		<!-- ============ FILTER START ========== -->
			<section class="filter-section" ng-controller="searchFilterCtrl">
				<div class="container">

				<div class="row">
          			<div class="col-sm-12">
            			<h2>نتائج البحث</h2>
            			<div class="jobs">



                			<div class="offer" ng-repeat="(key,value) in profile.res">
                				<div class="top-wrapper">
                  				<div class="row">
                  					<div class="col-sm-4 pull-right ">
				                        <div class="job-image">
				                            <img src="images/pp.png" alt="" title="" class="img-responsive pp"/>
				                        </div>
                    				</div>

                    				<div class="col-sm-8" >
				                        <p class="craftsmen-info"> الاسم :  {{profile.res[key].first_name }}</p>
				                        <p class="craftsmen-info">المدينة : {{profile.res[key].city}}</p>
				                        <p class="craftsmen-info">المهنة : {{profile.res[key].craft +" " }}</p>
				                        <p class="craftsmen-info">رقم الهاتف : {{profile.res[key].mobile +" " }}</p>
				                        <p class="craftsmen-info">التقيم : {{profile.res[key].rate +"%" }}</p>
				                        <div class="form-group">
				                            <a class="btn btn-primary" href="profile-view.php?user={{topCraftsmen.topCraftsmen[key].username}}">عرض الصفحة الشخصية </a>
				                        </div>
                    				</div>
                 				</div>
              					</div>
             				 </div>
            			</div>
             			 <!-- pagination-->
			            <ul class="pagination" >
			                  <li ng-repeat="x in pageNumbers" ng-click="showCraftsmenProfiles(selectedCraft,x)"><button>{{x}}</button></li>

              			</ul>
              			<!--end of pagination-->
         			 </div>
					</div>
				</div>
			</section>

		<!-- ============ FILTER END ========== -->

				<!-- ============ FOOTER START ============ -->

		<footer>
			<div id="prefooter">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" id="newsletter">
                                                    <p>
                                                        
                                                    </p>
						</div>
						<div class="col-sm-6" id="social-networks">
							<h2>Get in touch</h2>
							<a href="#"><i class="fa fa-2x fa-facebook-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-twitter-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-google-plus-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-youtube-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-vimeo-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-pinterest-square"></i></a>
							<a href="#"><i class="fa fa-2x fa-linkedin-square"></i></a>
						</div>
					</div>
				</div>
			</div>
			<div id="credits">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							&copy; 2018<br>
							Designed &amp; Developed by <a href="#" target="_blank">Craftsmen</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- ============ FOOTER END ============ -->

		<!-- ============ LOGIN START ============ -->

        <?php

            include "includes/login.php";
        ?>

		<!-- ============ LOGIN END ============ -->



        <script src="js/controllers/indexCtrl.js"></script>

        <script src="js/controllers/loginCtrl.js"></script>

        <script src="js/controllers/searchFilterCtrl.js"></script>



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

        <script src="js/search-filter.js"></script>

 </body>
 </html>

