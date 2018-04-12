


app.controller('forgetPassword', function($scope,$http) {



    $scope.sendForgetPasswordCode = function(){
       console.log($scope.data);
        $http.post("includes/dbHandler/forgetPasswordHandler.php",$scope.d).then(function(response){

            console.log(response.data)
        });
    }

});
