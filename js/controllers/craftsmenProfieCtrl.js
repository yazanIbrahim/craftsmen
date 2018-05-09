var app = angular.module('craftsmenProfile', []);

app.service('chart', function() {
    this.displayChart = function (chartData) {
        var chart = AmCharts.makeChart( "chartdiv", {
            "type": "serial",
            "theme": "light",
            "dataProvider": chartData,
            "valueAxes": [ {
                "gridColor": "#FFFFFF",
                "gridAlpha": 0.2,
                "dashLength": 0
            } ],
            "gridAboveGraphs": true,
            "startDuration": 1,
            "graphs": [ {
                "balloonText": "[[category]]: <b>[[value]]</b>",
                "fillAlphas": 0.8,
                "lineAlpha": 0.2,
                "type": "column",
                "valueField": "rate"
            } ],
            "chartCursor": {
                "categoryBalloonEnabled": false,
                "cursorAlpha": 0,
                "zoomable": false
            },
            "categoryField": "month",
            "categoryAxis": {
                "gridPosition": "start",
                "gridAlpha": 0,
                "tickPosition": "start",
                "tickLength": 20
            },
            "export": {
                "enabled": false
            }

        } );
    }
});

app.controller('craftsmenProfileCtrl', function($scope,$http,chart) {

    $scope.rate;
    //get craftsmen rate
    $http.get("includes/dbHandler/craftsmenProfileHandler.php?action=getRate").then(function(response){
        console.log(response.data.rate);
        if(response.data.rate !== false){

            $scope.rate = (response.data.rate);
            console.log("rate is "+$scope.rate);
            $("#rate").css('width',$scope.rate*20+"%");
        }else{
            console.log("not rated");
            $scope.rate = "لم تحصل على اي تقييم بعد";
        }


    });

    //get  rate data to display in chart
    $http.get("includes/dbHandler/craftsmenProfileHandler.php?action=chartData").then(function(response){
    console.log(response.data);

       chart.displayChart(response.data);


    });


});
