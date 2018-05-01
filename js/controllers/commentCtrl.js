/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 
*/

var app = angular.module('commentApp',[]);

var user = "";
app.service('regexService', function() {
    this.regexValidation = function () {
        return {firstName:/^[a-zA-Z]{2,16}$/, 
                        surName:/^[a-zA-Z]{2,16}$/,
                        email:/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/,
                        userName:/^[a-zA-Z]{5,16}[-_]{0,1}([a-zA-Z0-9]{0,8})$/,
                        password1:/^(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/
                    };
    };
});

app.controller('commentCtrl', function($scope,$http,$timeout) {

    $scope.msg = {
        'msg' : "",
        'show': false
    };
	
        $scope.commentInfo = {};
    $scope.craftsmenInfo = {};
    $scope.craftsmenCommentPage ={};
    $scope.pages = [];
    $scope.username = "";
    $scope.numberOfPages = 0;
    $scope.hidepagination = false;// variable to indicate if we should display a certain number of pages and then hide the rest whe
    //too many pages are there



    $scope.getCraftsmenInfoOnLoad = function(username){//get craftsmen info and comments when page loads
        $http.get("includes/dbHandler/commentHandler.php?action=getCraftsmenInfoOnLoad&username="+username).then(function(response){
            console.log(response.data);

            if($scope.pages.length > 8){
                $scope.hidepagination = true;
            }
            $scope.username = response.data.craftsmenInfo.username;

            user = response.data.craftsmenInfo.username;//username value for rating

            $scope.craftsmenInfo = response.data;
            $scope.numberOfPages = $scope.craftsmenInfo.numberOfPages;//when page loads store how many comments for this user in the DB


            $scope.numberOfPages = Math.ceil((parseInt( $scope.numberOfPages ) /3));



            for(var i=0;i<$scope.numberOfPages;i++){
                    $scope.pages[i] = i+1;
            }
        });
    }



    $scope.getComments = function(offset){//get comments for this craftsmen when clicking on the page number(pagination)

            offset =offset*3-3;

            $http.get("includes/dbHandler/commentHandler.php?action=getComments&offset="+offset+"&username="+$scope.username).then(function(response){
                console.log(response.data);


                $scope.craftsmenInfo.comments = response.data.comments;
            });
    }


    var timeOut =function(){
        $scope.msg.show = false;

    }


    $scope.comment = function(username){// store the comment in the db
		
        $scope.commentInfo['username'] = username;
      
        $http.post("includes/dbHandler/commentHandler.php",$scope.commentInfo).then(function(response){
			
			if(response.data.msg === true){
				
				$scope.msg.msg  = "تم اضافة تعليقك بنجاح";
				$scope.msg.show = true;
				 $timeout(timeOut,4000);
           
         
            console.log(response.data);
            $scope.craftsmenInfo.comments[$scope.craftsmenInfo.length-1] = response.data.comment;
           

            $scope.numberOfPages +=1;
          
				if($scope.numberOfPages % 3 === 0){


				  
					$scope.pages[$scope.pages.length] = $scope.pages.length+1;

				}
			}else{
				
				$scope.msg.msg  = "عليك تسجيل الدخول اولا";
				$scope.msg.show = true;
				 $timeout(timeOut,4000);
			}
           




        });
    }
});





