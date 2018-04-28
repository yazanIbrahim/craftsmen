
var app = angular.module('index', []);



app.controller('indexCtrl', function($scope,$http) {
    $scope.selectedCraft = null;
    $scope.topCrafts = {};
    $scope.craftsmenInfo = {};
    $scope.pageNumbers = [];
    $scope.topCraftsmen = {};


  

  $http.get("includes/dbHandler/indexHandler.php?action=topCraftsmen").then(function(response){
      console.log(response.data);
      $scope.topCraftsmen = response.data;

      
  });


  


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
