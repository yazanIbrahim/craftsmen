/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('signup', []);

app.service('regexService', function() {
    this.regexValidation = function () {
        return {firstName:/^[a-zA-Z]{2,16}| [\u0600-\u06FF]{2,16}$/,
            surName:/^[a-zA-Z]{2,16}$/,
            email:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
            userName:/^[a-zA-Z]{5,16}[-_]{0,1}([a-zA-Z0-9]{0,8})$/,
            password1:/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
            mobile:/^[0-9]{10}$/
        };
    };
});



app.controller('craftsmenSignupCtrl', function($scope,regexService,$http) {
    $scope.regex=regexService.regexValidation();
    $scope.craftsmenError     = {};
    $scope.craftsmenErrorFlag = {};
    $scope.craftsmenSignup = function(){
        $http.post("includes/dbHandler/craftsmenSignupHandler.php",$scope.craftsmen).then(function(response){

            console.log(response.data);
            if(response.data['type'] == "validationError"){
                $scope.craftsmenErrorFlag = {};
                console.log("validation error");
                $scope.craftsmenError = response.data['errors'];
                $scope.showSuccessMsg = false;
                for(var key in response.data['errors']){
                    $scope.craftsmenErrorFlag[key] = true;

                }
            }else if(response.data['type'] == "success"){
                console.log("succesmsg");
                $scope.successMsg = response.data['successMsg'];
                $scope.showSuccessMsg = true;
               $scope.craftsmenErrorFlag ={};
            }
            console.log($scope.craftsmenErrorFlag)

        });
    }



});
