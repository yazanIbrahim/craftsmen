

var app = angular.module('craftsmenProfileCommentsFetcher', []);


app.controller('craftsmenProfileCommentsFetcherCtrl', function($scope,$http) {

console.log("craftsmenProfileCommentsFetcherCtrl");

$scope.getComments = function(offset){
    $http.get("includes/dbHandler/craftsmenProfileCommentsFetcherHandler.php?action=getcomments&offset="+offset).then(function(response){

    });
}



});
