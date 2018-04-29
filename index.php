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
                                                                
                                <button type="submit" class="btn btn-primary mySearchBtn" ng-click="search()">Search</button>

							</form>
                            

                                                       
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



                <div class="offer" ng-repeat="(key,value) in topCraftsmen.topCraftsmen">


                <div class="top-wrapper">
                  <div class="row">
                  	<div class="col-sm-4 pull-right ">
                        <div class="job-image">
                            <img src="{{'images/'+topCraftsmen.topCraftsmen[key].image_path}}" alt="" title="" class="img-responsive pp"/>
                        </div>
                        

                    </div>

                    <div class="col-sm-8" >

                        <p class="craftsmen-info"> الاسم :  {{topCraftsmen.topCraftsmen[key].first_name }}</p>
                        <p class="craftsmen-info">المدينة : {{topCraftsmen.topCraftsmen[key].city}}</p>
                        <p class="craftsmen-info">المهنة : {{topCraftsmen.topCraftsmen[key].craft +" " }}</p>
                        <p class="craftsmen-info">رقم الهاتف : {{topCraftsmen.topCraftsmen[key].mobile +" " }}</p>
                        <p class="craftsmen-info">التقيم : {{topCraftsmen.topCraftsmen[key].rate }}</p>
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
						<h1>خدماتنا</h1>
						<!--<h4>اطلع على المزيد من الخدمات</h4>-->
					</div>
				</div>
				<div class="row pricing">
					<div class="col-sm-3 ourServ">
					   <img src="images/o-01.png" alt="خدمة">                  
                    </div>
					<div class="col-sm-3 ourServ">
					   <img src="images/o-02.png" alt="خدمة">                  
                    </div>
					<div class="col-sm-3 ourServ">
					   <img src="images/o-03.png" alt="خدمة">                  
                    </div>
					<div class="col-sm-3 ourServ">
					   <img src="images/o-04.png" alt="خدمة">                  
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
						<h2>جرب موقعنا على هاتفك</h2>
						<p>موقع Craftsmen هو موقع صمم بطريقة تجعله يتجاوب تلقائيا مع عرض شاشة جهاز التصفح. <br />حتى نقدم لكم أفضل خدمة حسب أجهزتهم - سواء كانت هاتف ذكي، جهاز لوحي، كمبيوتر محمول.</p>
						<p style="height=200px;">
							
						</p>
						<p>&nbsp;</p>
					</div>
				</div>
			</div>
		</section>

		<!-- ============ MOBILE APP END ============ -->

		

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



	</body>
</html>