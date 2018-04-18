




app.controller('searchCtrl', function($scope,$http) {
    $scope.searchValue ="";
    $scope.searchresults = {};
$scope.searchCraftsmen = function(){
    //console.log($scope.searchValue);

    $http.get("includes/dbHandler/searchHandler.php?search="+$scope.searchValue).then(function(response){

        console.log(response.data);
        if(!response.data['result'].isEmpty()){

            var searcResultClass = angular.element(document.querySelector(".search-result"));
            searcResultClass.addClass('search')
            $scope.searchresults = response.data.result;

            //console.log("search results is "+$scope.searchresults[0].craft);

        }

        else
            console.log("empty");
    });
}


});
