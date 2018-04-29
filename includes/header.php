<header>
    <div id="header-background"></div>
    <div class="container">
        <div class="pull-left">
           <div id="logo"><a href="index.php"><img src="images/logo.png" width="155px" height="40px" alt="Home"></a></div>
        </div>
        <div id="menu-open" class="pull-right">
            <a class="fm-button"><i class="fa fa-bars fa-lg"></i></a>
             <?php
            if(isset($_SESSION['user_id']) && isset($_SESSION['userType'])){
                require_once "includes/classes/Dbc.php";
                $db = new Dbc();
                $db = $db->getConn();
                $stmt = "SELECT first_name FROM masteruser WHERE user_id = ?";
                $query = $db->prepare($stmt);
                $query->execute(array($_SESSION['user_id']));
                $res = $query->fetch(PDO::FETCH_ASSOC);
                
                if($_SESSION['userType'] == 1){
                    echo '<div class="dropdown">
                        <a onclick="myFunction()" class="dropbtn">'. $res["first_name"]. ' </a>
                        <div id="myDropdown" class="dropdown-content">
                          <a href="craftsmen-profile.php" class="active">View profile</a>
                          <a href="profile.php">Setting</a>
                          <a href="includes/logout.php">Logout</a>
                        </div>
                      </div>';
                }
                elseif($_SESSION['userType'] == 0){ 
                   echo '<div class="dropdown">
                        <a onclick="myFunction()" class="dropbtn">'. $res["first_name"]. '</a>
                        <div id="myDropdown" class="dropdown-content">
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