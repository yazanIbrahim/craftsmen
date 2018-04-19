

var app = angular.module('craftsmenProfileCommentsFetcher', []);


app.controller('craftsmenProfileCommentsFetcherCtrl', function($scope,$http) {


    $scope.comments = {};
    $scope.numOfComments = [];
console.log("craftsmenProfileCommentsFetcherCtrl");

$scope.getComments = function(offset){

    console.log(offset);
    if(offset < 3){
        offset = offset*3;
    }else{
        offset = offset*3-3;

    }
    $http.get("includes/dbHandler/craftsmenProfileCommentsFetcherHandler.php?action=getcomments&offset="+offset).then(function(response){
        $scope.comments =  response.data.comments;
        //$scope.numOfComments = response.data.numofcomments;

       // console.log(response.data.numOfComments);
        for(var i = 0;i<response.data.numofcomments;i++){
            $scope.numOfComments[i] = i+1;
        }
        console.log($scope.comments);
        console.log($scope.numOfComments);


    });
}



});
