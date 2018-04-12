
var app = angular.module('index', []);



app.controller('indexCtrl', function($scope,$http) {
    $scope.selectedCraft = null;
    $scope.topCrafts = {};
    $scope.craftsmenInfo = {};
    $scope.pageNumbers = [];
    $scope.topCraftsmen = {};


  //get top 6 crafts
  $http.get("includes/dbHandler/indexHandler.php?action=topcrafts").then(function(response){
    console.log(response.data[0]);
    $scope.selectedCraft = response.data[0];//the first element of the crafts returned array
    $scope.topCrafts = response.data;

  });

  $http.get("includes/dbHandler/indexHandler.php?action=topCraftsmen").then(function(response){
      console.log(response.data);
      $scope.topCraftsmen = response.data;
      console.log($scope.topCraftsmen.topCraftsmen[0].first_name);
      
  });


  // get page numbers for the pagination
    /*$scope.getPageNumbers = function(){
      $http.get("includes/dbHandler/indexHandler.php?action=pageNumbers").then(function(response){
        console.log(response.data);
          $scope.craftsmenInfo = response.data.craftsmen;
          var num = Math.ceil(response.data.num /1);

          for(var i=0;i<num;i++){
            $scope.pageNumbers[i] = i+1;
          }
      });
    }*/


  $scope.showCraftsmenProfiles = function (craft,offset) {
    console.log("craft request is : ",craft );
      console.log("offset is :"+offset);
    offset = (offset * 3 )-3 ;
      console.log("offset is :"+offset);
    $http.get("includes/dbHandler/indexHandler.php?action=getCraftsmenProfiles&craft="+craft+"&offset="+offset).then(function(response){


        $scope.craftsmenInfo = response.data.craftsmen;
        var num = Math.ceil(response.data.num /6);

        for(var i=0;i<num;i++){
            $scope.pageNumbers[i] = i+1;
        }


      console.log(response.data)

    });
  }



});
