<?php
    session_start();
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<html>
 <?php
 include "includes/head.php";
 ?>
	<body ng-app="index" ng-controller="indexCtrl" ng-init="getPageNumbers()">
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
		<!-- ============ TITLE START ============ -->

		<section id="title">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h1>من نحن؟</h1>
						
					</div>
				</div>
			</div>
		</section>

		<!-- ============ TITLE END ============ -->

		<!-- ============ STORY START ============ -->

		<section id="story">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-sm-offset-3">
						<p>موقع Craftsmen يهدف لوصل الحرفيين بشكل مباشر مع الاشخاص الذين يحتاجون خدماتهم ، حيث ان عملية البحث عنهم و ايجاد الشخص المناسب في المكان المناسب تتطلب الوقت و الجهد ، و هنا ياتي دور الموقع بتوفير هذه الخدمة بعمل ملفات شخصية للحرفيين مع ارفاق المهنة و التقييم المبني على ارآء المستخدمين الذين تعاملوا سابقا مع هؤلاء الحرفيين و يتم التقييم بناءا على الخدمة المقدمة للمستخدمين ، و ايضا يوفر الموقع خانة التعليق التي تتيح الفرصة للمستخدمين لكتابة ارائهم اتجاه الحرفيين.</p>
					</div>
					
				</div>
			</div>
		</section>

		<!-- ============ STORY END ============ -->

		<!-- ============ LOGIN START ============ -->

        <?php

        include "includes/login.php";
        ?>

		<!-- ============ LOGIN END ============ -->


		<!-- ============ FOOTER START ============ -->

		<footer>
			<div id="prefooter">
				<div class="container">
					<div class="row">
						<div class="col-sm-6" id="newsletter">
                                                    <p></p>
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
							&copy; 2018 Craftsmen<br>
							Designed &amp; Developed by <a href="#" target="_blank">Craftsmen</a>
						</div>
					</div>
				</div>
			</div>
		</footer>

		<!-- ============ FOOTER END ============ -->

		
		<!-- ============ REGISTER START ============ -->

		<div class="popup" id="register">
			<div class="popup-form">
				<div class="popup-header">
					<a class="close"><i class="fa fa-remove fa-lg"></i></a>
					<h2>Register</h2>
				</div>
				<form>
					<ul class="social-login">
						<li><a class="btn btn-facebook"><i class="fa fa-facebook"></i>Register with Facebook</a></li>
						<li><a class="btn btn-google"><i class="fa fa-google-plus"></i>Register with Google</a></li>
						<li><a class="btn btn-linkedin"><i class="fa fa-linkedin"></i>Register with LinkedIn</a></li>
					</ul>
					<hr>
					<div class="form-group">
						<label for="register-name">Name</label>
						<input type="text" class="form-control" id="register-name">
					</div>
					<div class="form-group">
						<label for="register-surname">Surname</label>
						<input type="text" class="form-control" id="register-surname">
					</div>
					<div class="form-group">
						<label for="register-email">Email</label>
						<input type="email" class="form-control" id="register-email">
					</div>
					<hr>
					<div class="form-group">
						<label for="register-username">Username</label>
						<input type="text" class="form-control" id="register-username">
					</div>
					<div class="form-group">
						<label for="register-password1">Password</label>
						<input type="password" class="form-control" id="register-password1">
					</div>
					<div class="form-group">
						<label for="register-password2">Repeat Password</label>
						<input type="password" class="form-control" id="register-password2">
					</div>
					<button type="submit" class="btn btn-primary">Register</button>
				</form>
			</div>
		</div>

		<!-- ============ REGISTER END ============ -->
        <script src="js/controllers/indexCtrl.js"></script>

        <script src="js/controllers/loginCtrl.js"></script>
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