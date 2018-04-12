




app.controller('searchCtrl', function($scope,$http) {
    $scope.searchValue ="";
    $scope.searchresults = {};
$scope.searchCraftsmen = function(){
    //console.log($scope.searchValue);

    $http.get("includes/dbHandler/searchHandler.php?search="+$scope.searchValue).then(function(response){


        if(!angular.equals(response.data, {})){
            var searcResultClass = angular.element(document.querySelector(".search-result"));
            searcResultClass.addClass('search')
            $scope.searchresults = response.data;

        }

        else
            console.log("empty");
    });
}


});
