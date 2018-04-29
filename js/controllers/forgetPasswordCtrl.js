


app.controller('forgetPasswordCtrl', function($scope,$http) {


    
    $scope.sendForgetPasswordCode = function(){
       //console.log($scope.data);
        console.log("forgetpassword");
        $http.post("includes/dbHandler/forgetPasswordHandler.php",$scope.d).then(function(response){

            console.log(response.data)
            window.location.href = "forgetPasswordRedirect.php";
        });
    }

});
