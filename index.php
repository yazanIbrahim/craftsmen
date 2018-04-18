<?php
session_start();
    include "includes/classes/Dbc.php";
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
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

		<div id="slider" class="sl-slider-wrapper"  ng-controller="searchCtrl" >

			<div class="sl-slider">
			
				<div class="sl-slide" data-orientation="horizontal" data-slice1-rotation="-25" data-slice2-rotation="-25" data-slice1-scale="2" data-slice2-scale="2">
					<div class="sl-slide-inner">
						<div class="bg-img bg-img1" ></div>
						<div class="tint"></div>
						<div class="slide-content">
							<h2>هل تريد اصلاح عطل في منزلك ؟</h2>
							<h3>ليس هناك مكان افضل للبحث</h3>
							<form class="form-inline myFormInline">
                                <div class="form-group myFormGroup">
								    <input type="search" class="form-control myFormControl" id="newsletter-email" placeholder="ابحث بالاسم او المهنة" ng-model="searchValue" ng-keyup="searchCraftsmen()">

                                </div>
                                                                
                                <button type="submit" class="btn btn-primary mySearchBtn">Search</button>
                                                               
							</form>
                            <div class="mySearchDiv">
                                <ul class="search-result">
                                    <li class="search-result-item " ng-repeat="(key,value) in searchresults"><a href="search.php?q="> {{searchresults[key].craft}}</a></li>
                                </ul>
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

    <section id="jobs">

      <div class="banner_jobs">
        <div class="container" >

        </div> <!-- End Of Container -->
      </div>  <!-- End Of banner jobs -->

      <div class="container">

        <div class="row">
          <div class="col-sm-8">
            <h2>اكثر المهنين طلبا</h2>
            <div class="jobs">
            	<div class="row lead stars">
			                                <div id="stars" class="starrr">
			                                
			                                </div>
			                                <span id="count">0</span> 
			                        </div>


                <div class="offer" ng-repeat="(key,value) in topCraftsmen.topCraftsmen">


                <div class="top-wrapper">
                  <div class="row">
                  	<div class="col-sm-4 pull-right ">
                        <div class="job-image">
                            <img src="images/pp.png" alt="" title="" class="img-responsive pp"/>
                        </div>
                        

                    </div>

                    <div class="col-sm-8" >

                        <p class="craftsmen-info"> الاسم :  {{topCraftsmen.topCraftsmen[key].first_name }}</p>
                        <p class="craftsmen-info">المدينة : {{topCraftsmen.topCraftsmen[key].city}}</p>
                        <p class="craftsmen-info">المهنة : {{topCraftsmen.topCraftsmen[key].craft +" " }}</p>
                        <p class="craftsmen-info">رقم الهاتف : {{topCraftsmen.topCraftsmen[key].mobile +" " }}</p>

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
          <!--<div class="col-sm-4">
            <h2>Featured Jobs</h2>
            <a href="#">
              <img src="http://placehold.it/400x265.jpg" alt="Featured Job" class="img-responsive" />
              <div class="featured-job">
                <img src="http://placehold.it/60x60.jpg" alt="" class="img-circle" />
                <div class="title">
                  <h5>Web Designer</h5>
                  <p>Amazon</p>
                </div>
                <div class="data">
                  <span class="city"><i class="fa fa-map-marker"></i>New York City</span>
                  <span class="type full-time"><i class="fa fa-clock-o"></i>Full Time</span>
                  <span class="sallary"><i class="fa fa-dollar"></i>45,000</span>
                </div>
                <div class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque tristique euismod lorem, a consequat orci consequat a. Donec ullamcorper tincidunt nunc, ut aliquam est pellentesque porta. In neque erat, malesuada sit amet orci ac, laoreet laoreet mauris.</div>
              </div>
            </a>
          </div>
        </div>-->
      </div>
    </section>

    <!-- ============ JOBS END ============ -->

                 

                <!-- ============ HOW DOES IT WORK START ============ -->

		<section id="how" class="color2">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h2>كيف يعمل؟</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<p>الاحتباس الحراري (بالإنجليزية: Global warming) ازدياد درجة الحرارة السطحية المتوسطة في العالم مع زيادة كمية ثاني أكسيد الكربون، الميثان، وبعض الغازات الأخرى في الجو. هذه الغازات تسمى بغازات الدفيئة لأنها تساهم في تدفئة جو الأرض السطحي، وهي الظاهرة التي تعرف باسم الاحتباس</p>
                                                <p>الاحتباس الحراري (بالإنجليزية: Global warming) ازدياد درجة الحرارة السطحية المتوسطة في العالم مع زيادة كمية ثاني أكسيد الكربون، الميثان، وبعض الغازات الأخرى في الجو. هذه الغازات تسمى بغازات الدفيئة لأنها تساهم في تدفئة جو الأرض السطحي، وهي الظاهرة التي تعرف باسم الاحتباس</p>
						<p><a href="about.php" class="btn btn-primary">المزيد ...</a></p>
					</div>
					<div class="col-sm-6">
						<div class="video-wrapper">
							<iframe src="https://player.vimeo.com/video/121698707" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ HOW DOES IT WORK END ============ -->
                
		<!-- ============ PRICING START ============ -->

		<section id="pricing" class="text-center">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1>Plans &amp; Pricing</h1>
						<h4>Choose a package that fits your needs</h4>
					</div>
				</div>
				<div class="row pricing">
					<div class="col-sm-3">
						<ul>
							<li class="title">Free</li>
							<li class="price">$0</li>
							<li>1 job posting</li>
							<li>No featured jobs</li>
							<li>Displayed for 5 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul class="popular">
							<li class="title">Startup</li>
							<li class="price">$19</li>
							<li>1 job posting</li>
							<li>No featured jobs</li>
							<li>Displayed for 30 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
							<li class="title">Company</li>
							<li class="price">$29</li>
							<li>3 job postings</li>
							<li>No featured jobs</li>
							<li>Displayed for 60 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
					<div class="col-sm-3">
						<ul>
							<li class="title">Enterprise</li>
							<li class="price">$39</li>
							<li>5 job postings</li>
							<li>3 featured jobs</li>
							<li>Displayed for 90 days</li>
							<li><a href="post-a-job.html" class="btn btn-primary">Choose</a></li>
						</ul>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ PRICING END ============ -->
                

		<!-- ============ MOBILE APP START ============ -->

		<section id="app" class="color2">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div id="phone"></div>
					</div>
					<div class="col-sm-offset-1 col-sm-6">
						<p>&nbsp;</p>
						<h2>Get Jobseek app</h2>
						<p>Curabitur et lorem a massa tempus aliquam. Aenean aliquam volutpat gravida. Pellentesque in neque nec tortor sagittis tempor quis in lectus. Vestibulum vehicula aliquet elit ut porta. Sed ipsum felis, interdum blandit purus sed, volutpat ultricies sem. Maecenas feugiat, lectus vitae luctus feugiat, nulla nisl dignissim velit, nec malesuada ligula orci et metus. In vulputate laoreet luctus.</p>
						<p>
							<a href="#" class="btn btn-default"><i class="fa fa-apple"></i> IOS</a>
							<a href="#" class="btn btn-default"><i class="fa fa-android"></i> Android</a>
						</p>
						<p>&nbsp;</p>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ MOBILE APP END ============ -->

		<!-- ============ CLIENTS START ============ -->

		<section id="clients">
			<div class="container">
				<div class="row text-center">
					<div class="col-sm-12">
						<h1>Happy Clients</h1>
						<h4>Some of the many companies we’ve helped</h4>
						<div class="owl-carousel">
							
							<!-- Logo 1 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>
							
							<!-- Logo 2 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>
							
							<!-- Logo 3 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>
							
							<!-- Logo 4 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>
							
							<!-- Logo 5 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>
							
							<!-- Logo 6 -->
							<div>
								<a href="company.html"><img src="http://placehold.it/133x69.gif" alt="" /></a>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ CLIENTS END ============ -->


		<!-- ============ CONTACT START ============ -->

		<section id="contact" class="color2">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<h2>Drop us a line</h2>
						<form role="form" name="contact-form" id="contact-form" action="process.php">
							<div class="form-group" id="contact-name-group">
								<label for="contact-name" class="sr-only">Name</label>
								<input type="text" class="form-control" id="contact-name" placeholder="Name">
							</div>
							<div class="form-group" id="contact-email-group">
								<label for="contact-email" class="sr-only">Email</label>
								<input type="email" class="form-control" id="contact-email" placeholder="Email">
							</div>
							<div class="form-group" id="contact-subject-group">
								<label for="contact-subject" class="sr-only">Subject</label>
								<input type="text" class="form-control" id="contact-subject" placeholder="Subject">
							</div>
							<div class="form-group" id="contact-message-group">
								<label for="contact-message" class="sr-only">Message</label>
								<textarea class="form-control" rows="3" id="contact-message"></textarea>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					</div>
					<div class="col-sm-6">
						<h2>Visit our office</h2>
						<div class="row">
							<div class="col-sm-6">
								<h5>New York</h5>
								<p>5 Park Avenue<br>
								New York, NY 10016<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 718.242.5555<br>
								<i class="fa fa-fax"></i>+1 718.242.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:ny@jobseek.com">ny@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
							<div class="col-sm-6">
								<h5>Los Angeles</h5>
								<p>8605 Santa Monica Blvd<br>
								Los Angeles, CA 90069-4109<br>
								USA</p>
								<p><i class="fa fa-phone"></i>+1 985.562.5555<br>
								<i class="fa fa-fax"></i>+1 985.562.5556<br>
								<i class="fa fa-envelope"></i><a href="mailto:la@jobseek.com">la@jobseek.com</a></p>
								<p><i class="fa fa-clock-o"></i>Mon-Fri 9am - 5pm<br>
								<i class="fa fa-clock-o"></i>Sat 10am - 2pm<br>
								<i class="fa fa-clock-o"></i>Sun Closed</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ CONTACT END ============ -->


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

        <script src="js/controllers/searchCtrl.js"></script>


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