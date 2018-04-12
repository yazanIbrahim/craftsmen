<div class="popup" id="login"  ng-controller="loginCtrl" ng-init="">
    <div class="popup-form">
        <div class="popup-header">
            <a class="close"><i class="fa fa-remove fa-lg"></i></a>
            <h2>تسجيل الدخول</h2>
        </div>
        <form>



            <div class="form-group">
                <label for="login-username" >اسم المستخد او الايميل </label>
                <input type="text" ng-model="user.credential" class="form-control" id="login-username">
                <div class="alert alert-danger" ng-show="showValidError.credentialError">{{error.credentialError}}</div>
            </div>

            <div class="form-group">
                <label for="login-password">كلمة المرور</label>
                <input type="password" ng-model="user.password" class="form-control" id="login-password">
                <div class="alert alert-danger" ng-show="showValidError.passwordError">{{error.passwordError}}</div>
            </div>



            <a href="forgetPassword.php">نسيت كلمة السر ؟</a>
            <button  ng-click="login()" type="submit" class="btn btn-primary">تسجيل الدخول</button>
            <div class="alert alert-danger" ng-show="showLoginError">
                {{error.login}}
            </div>
        </form>



    </div>
</div>

