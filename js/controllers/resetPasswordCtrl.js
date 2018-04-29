


app.controller('resetPasswordCtrl', function($scope,$http) {



    $scope.resetPassword = function(token){
        console.log($scope.data);
        $scope.password ['token'] = token;
        $http.post("includes/dbHandler/resetPasswordHandler.php",$scope.password).then(function(response){

            console.log(response.data)
            window.location.href = "resetPasswordRedirect.php";
        });
    }

});
