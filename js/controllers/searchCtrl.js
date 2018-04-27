




app.controller('searchCtrl', function($scope,$http) {
    $scope.searchValue ="";
    $scope.searchresults = {};

    $scope.search = function(){//when the user clicks on the search button

        $http.post("includes/dbHandler/searchHandler.php",$scope.searchValue).then(function(response){

            window.location.href = "search-filter.php?q="+$scope.searchValue;
        });

    }
$scope.searchCraftsmen = function(){// get serach results as user types in the search bar
    //console.log($scope.searchValue);

    $http.get("includes/dbHandler/searchHandler.php?search="+$scope.searchValue).then(function(response){

        console.log(response.data);
        if(response.data.length != 0){

            var searcResultClass = angular.element(document.querySelector(".search-result"));
            searcResultClass.addClass('search')
            $scope.searchresults = response.data;

            //console.log("search results is "+$scope.searchresults[0].craft);

        }

        else
            console.log("empty");
    });
}


});
