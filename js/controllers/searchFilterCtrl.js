/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.

*/


function parse_query_string(query) {
    var vars = query.split("&");
    var query_string = {};
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        // If first entry with this name
        if (typeof query_string[pair[0]] === "undefined") {
            query_string[pair[0]] = decodeURIComponent(pair[1]);
            // If second entry with this name
        } else if (typeof query_string[pair[0]] === "string") {
            var arr = [query_string[pair[0]], decodeURIComponent(pair[1])];
            query_string[pair[0]] = arr;
            // If third or later entry with this name
        } else {
            query_string[pair[0]].push(decodeURIComponent(pair[1]));
        }
    }
    return query_string;
}

app.controller('searchFilterCtrl', function($scope,$http) {

console.log("filter controller ");

    var query = window.location.search.substring(1);
    var sq = parse_query_string(query);

    //get serach results according to the url parameters
    //sq = search query
    $http.get("includes/dbHandler/searchFilterHandler.php?sq="+sq.q).then(function(response){
        console.log(response.data.res);

    })


});





