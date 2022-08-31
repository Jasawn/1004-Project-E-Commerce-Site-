/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if (getQueryVariable("product-sort")){
    document.getElementById("product-sort").value = getQueryVariable("product-sort");
}
if (getQueryVariable("product-search")){
    document.getElementById("product-search").value = getQueryVariable("product-search");
}

$(document).ready(function () {
    $("#product-sort").value = getQueryVariable("product-sort");
    
    $(".product-img").click(function () {
        var img = $(this).attr("src");
        $("#modal-img").attr("src", img);
        $("#modal").modal("show");
    });
});

function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split("&");
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            return pair[1];
        }
    }
}