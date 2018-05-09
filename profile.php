<?php
session_start();


include "includes/classes/Helper.php";
include "includes/classes/User.php";
include "includes/classes/craftsmen.php";
include "includes/classes/Dbc.php";
if (!isset($_SESSION['user_id']))
    Helper::redirect("index.php", 2);
else {

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
               <h2>تعديل</h2> 
              </div>
            <!-- /.col-lg-12 -->
            <!-- /.row -->
            <!-- .row -->
            <div class="row">
              <div class="col-md-4 col-xs-12">
                <div class="white-box">
                  <div class="user-bg">
                    <label for="file-input">
                      <div class="overlay-box">

                        <img width="100%" alt="" src="images/<?php echo $craftsmen->getImage();?>"id="previewImg">






                        <form enctype="multipart/form-data">

                        <input id="file-input" type="file" onchange="previewFile()" style="display:none" required/>
                        </form>
                      </div>
                    </label>
                  </div>
                  <div class="user-btm-box">
                    <div class="col-sm-12 offset-4 text-center">
                      <button class="btn btn-primary myBtn-primary " onclick="upload()">upload</button>
                      <div class="alert alert-success text-center" id="success-alert" > تم التحميل بنجاح</div>
                      <div class="alert alert-danger text-center" id="danger-alert">فشل التحميل الرجاء اختيار صورة</div>
                    </div>

                  </div>

                  <div class="alert alert-danger" class="imageUploadMsg" style="display:none"></div>
                </div>
              </div>
              <div class="col-md-8 col-xs-12">
                <div class="white-box">
                  <form class="form-horizontal form-material" id= "craftmenUpdate" name="craftmenUpdate">


                    <div class="form-group">
                      <label class="col-md-12">الاسم الأول</label>
                      <div class="col-md-12">

                        <input type="text" placeholder="" class="form-control form-control-line" name="firstName" ng-model="updateInfo.firstName" ng-pattern="regex.firstName" > </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.firstNameError" >{{error.firstNameError}}</div>

                    </div>
                    <div class="form-group">
                      <label class="col-md-12">اسم العائلة</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" name="surName" ng-model="updateInfo.surName" pattern="" >
                      </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.surNameError">{{error.surNameError}}</div>

                    </div>

                    <div class="form-group">
                      <label for="example-email" class="col-md-12">البريد الالكتروني</label>
                      <div class="col-md-12">
                        <input type="email" placeholder="" class="form-control form-control-line" name="email" ng-model="updateInfo.email" id="example-email" pattern="" > </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.emailError" >{{error.emailError}}</div>

                    </div>
                    <div class="form-group">
                      <label for="example-email" class="col-md-12">اسم المستخدم</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" name="userName" ng-model="updateInfo.userName" pattern="" > </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.userNameError" >{{error.userNameError}}</div>

                    </div>



                    <div class="form-group">
                      <label class="col-md-12">رقم الهاتف</label>
                      <div class="col-md-12">
                        <input type="text" placeholder="" class="form-control form-control-line" ng-model="updateInfo.mobile"ng-pattern="regex.mobile"> </div>
                      <div class="alert alert-danger" ng-show="updateErrorFlags.mobileError" >{{error.mobileError}}</div>
                    </div>

                    <div class="form-group">
                      <label class="col-md-12">الوصف</label>
                      <div class="col-md-12">
                        <textarea rows="5" ng-model="updateInfo.bio" placeholder= "" class="form-control form-control-line"></textarea>

                      </div>
                      <div class="alert alert-danger"  ng-show="updateErrorFlags.bio">{{error.bio}}</div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-12">المهنة</label>
                      <div class="col-sm-12">
                        <select ng-model="updateInfo.craft" class="form-control form-control-line">
                            <option selected>كهربجي</option>
                            <option>حداد</option>
                            <option>نجار</option>
                            <option>فني تكيف وتبريد</option>
                            <option>مواسرجي</option>
                            <option>دهين</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-12">المدينة</label>
                      <div class="col-sm-12">
                        <select ng-model="updateInfo.city"class="form-control form-control-line">
                            <option selected>عمان</option>
                            <option>اربد </option>
                            <option>جرش </option>
                            <option>عجلون </option>
                            <option>المفرق </option>
                            <option>البلقاء-السلط </option>
                            <option>الزرقاء</option>
                            <option>معان </option>
                            <option>الطفيلة </option>
                            <option>الكرك </option>
                            <option>العقبة </option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button class="myBtn-primary" ng-click="update()">Update</button>
                      </div>
                    </div>

                    <div class="alert alert-danger" ng-show="updateMsgFlag">{{updateMsg}}</div>
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
