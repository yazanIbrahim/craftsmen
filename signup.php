
<!DOCTYPE html>
<html>

 <?php
    include "includes/head.php";
 ?>
	<body ng-app="signup"  ng-init="showSuccessMsg = false">
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


        <div class="row">
            <div class="col-lg-6 col-lg-offset-3">
                <div class="card hovercard">
                    <div class="card-background">

                    </div>
                    <div class="useravatar">

                    </div>
                    <div class="card-info"> <span class="card-title">التسجيل</span>

                    </div>
                </div>
                <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
                    <div class="btn-group" role="group">
                        <button type="button" ng-click="clear()" onclick="myFunction()"id="stars" class="btn btn-primary" href="#craftsmen" data-toggle="tab"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                            <div class="hidden-xs">مهني</div>
                        </button>
                    </div>
                    <div class="btn-group" role="group">
                        <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                            <div class="hidden-xs">مستخدم</div>
                        </button>
                    </div>

                </div>



                <div class="row">
                    <div class="col-lg-12 col-sm-12 " >
                        <div class="well" style="width:100%">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="craftsmen" ng-controller="craftsmenSignupCtrl" >
                                    <form name="craftmenSignup" id="craftmenSignup">


                                        <hr>
                                        
                                        <div class="form-group" style="direction: rtl">
                                            <label for="register-name">الاسم الأول</label>
                                            <input type="text" class="form-control"  name="firstName" ng-model="craftsmen.firstName" ng-pattern="regex.firstName" >
                                            <div class="alert alert-danger"  ng-show="craftsmenErrorFlag.firstNameError" >{{craftsmenError.firstNameError}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-surname">اسم العائلة</label>
                                            <input type="text" class="form-control"  name="surName" ng-model="craftsmen.surName" ng-pattern="regex.surName" required>
                                            <div class="alert alert-danger"  ng-show="craftsmenErrorFlag.surNameError">{{craftsmenError.surNameError}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="register-email">البريد الالكتروني</label>
                                            <input type="text" class="form-control"  name="email" ng-model="craftsmen.email" ng-pattern="regex.email" required>
                                            <div class="alert alert-danger" ng-show="craftsmenErrorFlag.emailError" >{{craftsmenError.emailError}}</div>
                                        </div>

                                        <hr>

                                        <div class="form-group">
                                            <label for="register-username">اسم المستخدم</label>
                                            <input type="text" class="form-control" name="userName" ng-model="craftsmen.userName" ng-pattern="regex.userName" required>
                                            <div class="alert alert-danger" ng-show="craftsmenErrorFlag.userNameError" >{{craftsmenError.userNameError}}</div>
                                            {{errorFlags.userNameError}}
                                        </div>

                                        <div class="form-group">
                                            <label for="">كلمة السر</label>
                                            <input type="password" class="form-control"  name="password1" ng-model="craftsmen.password1" ng-pattern="" required>
                                            <div class="alert alert-danger"  ng-show="craftsmenErrorFlag.password1Error">{{craftsmenError.password1Error}}</div>
                                        </div>

                                        <div class="form-group">
                                            <label for="">اعادة كلمة السر</label>
                                            <input type="password"  class="form-control"   name="password2" ng-model="craftsmen.password2" ng-pattern="" required>
                                            <div class="alert alert-danger"   ng-show="craftsmenErrorFlag.password2Error">{{craftsmenError.password2Error}}</div>

                                        </div>

                                        <div class="form-group">
                                            <label for="">رقم الهاتف</label>
                                            <input type="tel"  class="form-control"   name="mobile" ng-model="craftsmen.mobile" pattern="" required>
                                            <div class="alert alert-danger"   ng-show="craftsmenErrorFlag.mobileError">{{craftsmenError.mobileError}}</div>

                                        </div>

                                        <div class="form-group" id="craft">
                                            <label >المهنة</label>
                                            <select ng-model="craftsmen.craft" class="form-control">
                                                <option selected>كهربجي</option>

                                                <option>حداد</option>
                                                <option>اخرى</option>
                                            </select>

                                        </div>

                                        {{craftsmen.craft}}

                                        <div class="form-group">
                                            <label >المدينة</label>
                                            <select ng-model="craftsmen.city" class="form-control">
                                                <option selected>عمان</option>
                                                <option>اربد </option>
                                                <option>الزرقاء</option>
                                            </select>

                                        </div>


                                        <button  type="submit" ng-click="craftsmenSignup()" class="btn btn-primary">تسجيل</button>

                                        <div class="alert alert-success" ng-show="showSuccessMsg">{{successMsg}}</div>
                                    </form>
                                </div>


                                <div class="tab-pane fade in" id="tab2">
                                    <form name="usersSignUp" id="userSignUp" ng-controller="endUserSignupCtrl">


                                        <hr>

                                        <div class="form-group" style="direction: rtl">
                                            <label for="register-name">الاسم الأول</label>
                                            <input type="text" class="form-control" id="register-name" name="firstName" ng-model="user.firstName" ng-pattern="regex.firstName" required>
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.firstNameError" >{{endUserError.firstNameError}}</div>
 
                                        </div>
                                        <div class="form-group">
                                            <label for="register-surname">اسم العائلة</label>
                                            <input type="text" class="form-control" id="register-surname" name="surName" ng-model="user.surName" ng-pattern="regex.surName" required>
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.surNameError" >{{endUserError.surNameError}}</div>

                                        </div>
                                        <div class="form-group">
                                            <label for="register-email">البريد الالكتروني</label>
                                            <input type="email" class="form-control" id="register-email" name="email" ng-model="user.email" ng-pattern="regex.email" required>
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.emailError" >{{endUserError.emailError}}</div>
                                          
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <label for="register-username">اسم المستخدم</label>
                                            <input type="text" class="form-control" id="register-username" name="userName" ng-model="user.userName" ng-pattern="regex.userName" required>
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.userNameError" >{{endUserError.userNameError}}</div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password1">كلمة السر</label>
                                            <input type="password" class="form-control" id="register-password1" name="password1" ng-model="user.password1" ng-pattern="regex.password1" required>
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.password1Error" >{{endUserError.password1Error}}</div>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password2">اعادة كلمة السر</label>
                                            <input type="password" class="form-control" id="register-password2"  name="password2" ng-model="user.password2">
                                            <div class="alert alert-danger"  ng-show="endUserErrorFlags.password2Error" >{{endUserError.password2Error}}</div>
                                        </div>
                                        <button  ng-click="endUserSignup()" type="submit" class="btn btn-primary">تسجيل</button>
                                        <div class="alert alert-success" ng-show="showSuccessMsg">{{successMsg}}</div>

                                        
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

            
		<!-- ============ FOOTER START ============ -->

        <?php

            include "includes/footer.php";
        ?>

		<!-- ============ FOOTER END ============ -->


        <!- =============== login start =========== -->

        <?php
            include "includes/Login.php";
        ?>

        <!- =============== login end =========== -->
        <script src="js/controllers/craftsmenSignupCtrl.js"></script>
        <script src="js/controllers/endUserSignupCtrl.js"></script>
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
                
                <script src="js/functions.js"></script>

        <script src="js/controllers/loginCtrl.js"></script>

                <script>
                    function myFunction() {
                        document.getElementById("craftmenSignup").reset();
                        document.getElementById("userSignUp").reset();
                    }
                </script>



	</body>
</html>