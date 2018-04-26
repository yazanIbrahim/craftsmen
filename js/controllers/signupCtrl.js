/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var app = angular.module('myApp', []);

app.service('regexService', function() {
    this.regexValidation = function () {
        return {firstName:/^[a-zA-Z]{2,16}$/, 
                        surName:/^[a-zA-Z]{2,16}$/,
                        email:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        userName:/^[a-zA-Z]{5,16}[-_]{0,1}([a-zA-Z0-9]{0,8})$/,
                        password1:/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        mobile:/^[0-9]{4,16}$/
                    
                    };
    };
});

app.controller('signupCtrl', function($scope,regexService,$http) {
    $scope.regex=regexService.regexValidation();




    // signupType : define wether its a craftsmen or a normal user




    $scope.signup = function(signupType){


        if(signupType == "craftsmen"){


            $http.post("includes/dbHandler/signupDbHandler.php?type="+signupType,JSON.stringify($scope.craftsmen))

                .then(function(response){
                console.log(response.data);
                $scope.error = response.data;
                    $scope.errorFlags = {};

                    for(var key in response.data){

                        //  console.log("key is : "+key);
                        // console.log("value is : "+ $scope.error[key]);

                        $scope.errorFlags[key] = true;
                        console.log(key);

                    }
console.log("---------------------------------------------------");
                    for(var key in $scope.errorFlags)
                        console.log(key);




               // console.log("erros fag "+$scope.errorFlags);


            });
        }else{
            $http.post("includes/dbHandler/signupDbHandler.php?type="+signupType,JSON.stringify($scope.user))
                    .then(function(response){

                        console.log(response.data);
                        $scope.error = response.data;
                        $scope.userErrorFlags = {};

                        for(var key in response.data){
                        //  console.log("key is : "+key);
                        // console.log("value is : "+ $scope.error[key]);
                            $scope.userErrorFlags[key] = true;
                            console.log(key);
                        }
                        console.log("---------------------------------------------------");
                        for(var key in $scope.userErrorFlags)
                            console.log(key);
                    });
        }
    };

    $scope.matchPass = function(pass1,pass2){
        
        console.log(pass1+ "   "+ pass2);
        if(pass1 === pass2){
            console.log("ssss")
            $scope.craftmenSignup['password2'].$setValidity("match", true);
        }
        else{
            console.log("fuck")
            $scope.craftmenSignup.password2.$setValidity("not match", false);
        }
    };

});
