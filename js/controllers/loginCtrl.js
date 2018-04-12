/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */





app.controller('loginCtrl', function($scope,$http) {

    $scope.user = {};

    $scope.login = function(){

        $http.post("includes/dbHandler/loginHandler.php",$scope.user).then(function(response){
            $scope.showValidError = {}

                if(response.data['type'] == "craftsmenRedirect")
                    window.location.href = "craftsmen-profile.php";
                else if(response.data['type'] == "userRedirect"){
                    window.location.href = "user-profile.php";

                }


                else if(response.data['type'] == "loginError" ){

                    $scope.showValidError =false;
                    $scope.error = response.data['errors'];
                    $scope.showLoginError = true;
                    $scope.showValidError = false;

                }else if(response.data['type'] == "validationError"){
                    for(var key in response.data['errors']){
                        $scope.showValidError[key] = true;
                    }
                    $scope.error = response.data['errors'];
                    $scope.showLoginError = false;


                }



        });


    }

});
