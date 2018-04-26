<header >
    <div id="header-background"></div>
    <div class="container">
        <div class="pull-left">
            <div id="logo"><a href="index.php">Craftsmen</a></div>
        </div>
        <div id="menu-open" class="pull-right">
            <a class="fm-button"><i class="fa fa-bars fa-lg"></i></a>
             <?php
            if(isset($_SESSION['user_id']) && isset($_SESSION['userType'])){
                require_once "includes/classes/Dbc.php";
                require_once "includes/classes/User.php";
                require_once "includes/classes/craftsmen.php";
                $db = new Dbc();
                $db = $db->getConn();
                $craftsmen = new craftsmen($db);
                $craftsmen->retrieveData($_SESSION['user_id']);
                if($_SESSION['userType'] == 1){
                    echo '<div class="dropdown">
                        <a onclick="myFunction()" class="dropbtn">$craftsmen->getUserName();</a>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="craftsmen-profile.php" class="active">View profile</a>
                          <a href="profile.php">Setting</a>
                          <a href="includes/logout.php">Logout</a>
                        </div>
                      </div>';
                }
                elseif($_SESSION['userType'] == 0){ 
                   echo '<div class="dropdown">
                        <a onclick="myFunction()" class="dropbtn">User</a>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="craftsmen-profile.php" class="active">View profile</a>
                          <a href="profile.php">Setting</a>
                          <a href="includes/logout.php">Logout</a>
                        </div>
                      </div>';
                   
                }
                 }else {
                    echo '  <div id="register-loginBox" class="pull-left">
                    <ul class="registerBox list-unstyled list-inline">
                        <li><a href="signup.php">تسجيل</a></li>
                        <li><a class="link-login" ng-click="setDefualt()">تسجيل الدخول</a></li>
                    </ul>';

                
                }
            
            ?>
        </div>
             </div>

    </div>
</header>