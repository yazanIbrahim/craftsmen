var app = angular.module('craftsmenProfile', []);

app.service('chart', function() {
    this.displayChart = function (chartData) {
        var chartData = generatechartData();

        function generatechartData() {
            var chartData = [];
            var firstDate = new Date();
            firstDate.setDate(firstDate.getDate() - 150);
            var visits = 500;

            for (var i = 0; i < 150; i++) {
                // we create date objects here. In your data, you can have date strings
                // and then set format of your dates using chart.dataDateFormat property,
                // however when possible, use date objects, as this will speed up chart rendering.
                var newDate = new Date(firstDate);
                newDate.setDate(newDate.getDate() + i);

                visits += Math.round((Math.random()<0.5?1:-1)*Math.random()*10);

                chartData.push({
                    date: newDate,
                    visits: visits
                });
            }
            return chartData;
        }


        var chart = AmCharts.makeChart("chartdiv", {
            "theme": "light",
            "type": "serial",
            "marginRight": 80,
            "autoMarginOffset": 20,
            "marginTop":20,
            "dataProvider": chartData,
            "valueAxes": [{
                "id": "v1",
                "axisAlpha": 0.1
            }],
            "graphs": [{
                "useNegativeColorIfDown": true,
                "balloonText": "[[category]]<br><b>value: [[value]]</b>",
                "bullet": "round",
                "bulletBorderAlpha": 1,
                "bulletBorderColor": "#FFFFFF",
                "hideBulletsCount": 50,
                "lineThickness": 2,
                "lineColor": "#fdd400",
                "negativeLineColor": "#67b7dc",
                "valueField": "visits"
            }],
            "chartScrollbar": {
                "scrollbarHeight": 5,
                "backgroundAlpha": 0.1,
                "backgroundColor": "#868686",
                "selectedBackgroundColor": "#67b7dc",
                "selectedBackgroundAlpha": 1
            },
            "chartCursor": {
                "valueLineEnabled": true,
                "valueLineBalloonEnabled": true
            },
            "categoryField": "date",
            "categoryAxis": {
                "parseDates": true,
                "axisAlpha": 0,
                "minHorizontalGap": 60
            },
            "export": {
                "enabled": true
            }
        });

        chart.addListener("dataUpdated", zoomChart);
//zoomChart();

        function zoomChart() {
            if (chart.zoomToIndexes) {
                chart.zoomToIndexes(130, chartData.length - 1);
            }
        }
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

       chart.displayChart(response.data);
        //console.log(response.data);

    });


});
