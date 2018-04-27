/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 
*/

var app = angular.module('updateApp',[]);

app.service('regexService', function() {
    this.regexValidation = function () {
        return {firstName:/^[a-zA-Z]{2,16}$/, 
                        surName:/^[a-zA-Z]{2,16}$/,
                        email:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        userName:/^[a-zA-Z]{5,16}[-_]{0,1}([a-zA-Z0-9]{0,8})$/,
                        password1:/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        password2:/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/,
                        mobile:/^[0-9]{4,16}$/
                    };
    };
});

app.controller('updateCtrl', function($scope,$http) {
    $scope.craftsmenPlaceHolder = {};
    $scope.updateInfo = {};
    $scope.responseMsg;
    $scope.updateMsg;
    $scope.updateMsgFlag = false;

    $responseMsgFlag = false;//flag to show msg or not
    $http.get("includes/dbHandler/craftsmenProfileHandler.php?action=craftsmenPlaceHolder").then(function(response){

            $scope.craftsmenPlaceHolder = response.data;

             $scope.updateInfo = response.data;


     });


    $scope.update = function(){


        $http.post("includes/dbHandler/updateHandler.php",$scope.updateInfo).then(function(response){

            $scope.error = response.data;
            $scope.updateErrorFlags = {};
            for(var key in response.data){
                $scope.updateErrorFlags[key] = true;
               
            }

            $scope.updateMsgFlag = true;
            $scope.updateMsg = response.data.msg;
        });
    }
    
    $scope.updatePassword = function(){
        console.log($scope.updatePass);


        $http.post("includes/dbHandler/updatePasswordHandler.php",$scope.updatePass).then(function(response){
            console.log(response.data);
            $responseMsgFlag = true;
            $responseMsg = response.data.res;//response msg from the server 
            console.log($responseMsg);
            
            $scope.error = response.data;
            $scope.updatePassErrorFlags = {};
            for(var key in response.data){
                $scope.updatePassErrorFlags[key] = true;
               
            }
        });
    }

});





