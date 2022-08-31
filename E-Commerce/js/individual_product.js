/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    $("#add-to-cart-btn").on("click", function () {
        var id = $(this).siblings('.product-id-class').text();
        var price = $(this).siblings('.product-price-class').text();
        var image = $(this).siblings('.product-image-class').text();
        var name = $(this).siblings('.product-name-class').text();
        var desc = $(this).siblings('.product-desc-class').text();
        var quantity = $(this).siblings('.product-quantity-class').text();

        $.ajax({
           url: "divcreate.php",
           method:"POST",
           data: {action: "addToCart", id: id, quantity: quantity, price: price, image: image, name: name, desc: desc},
           success: function() {
               location.reload();
           }
        });
    });
    
    var reviewRating;
    
    $(".product-img").click(function () {
        var img = $(this).attr("src");
        $("#modal-img").attr("src", img);
        $("#modal").modal("show");
    });
    
    $("#collapseReview").css("display","none");
    $("#collapseDescBtn").css("font-weight","bold");
    
    $("#collapseDescBtn").click(function () {
        $("#collapseDesc").css("display","block");
        $("#collapseReview").css("display","none");
        $("#collapseDescBtn").css("font-weight","bold");
        $("#collapseReviewBtn").css("font-weight","normal");
    });
    
    $("#collapseReviewBtn").click(function () {
        $("#collapseDesc").css("display","none");
        $("#collapseDescBtn").css("font-weight","normal");
        $("#collapseReviewBtn").css("font-weight","bold");
        $("#collapseReview").css("display","block");
        
    });
    
    $(".review-star").click(function () {
        var id = $(this).attr("id");
        
        $("#review-star-1").removeClass("bi-star bi-star-fill");
        $("#review-star-2").removeClass("bi-star bi-star-fill");
        $("#review-star-3").removeClass("bi-star bi-star-fill");
        $("#review-star-4").removeClass("bi-star bi-star-fill");
        $("#review-star-5").removeClass("bi-star bi-star-fill");
            
        if (id == "review-star-1"){
            $("#review-star-1").addClass("bi-star-fill");
            $("#review-star-2").addClass("bi-star");
            $("#review-star-3").addClass("bi-star");
            $("#review-star-4").addClass("bi-star");
            $("#review-star-5").addClass("bi-star");
            
            $("#review-radio-1").prop("checked", true);
        }
        else if (id == "review-star-2"){
            $("#review-star-1").addClass("bi-star-fill");
            $("#review-star-2").addClass("bi-star-fill");
            $("#review-star-3").addClass("bi-star");
            $("#review-star-4").addClass("bi-star");
            $("#review-star-5").addClass("bi-star");
            
            $("#review-radio-2").prop("checked", true);
        }
        else if (id == "review-star-3"){
            $("#review-star-1").addClass("bi-star-fill");
            $("#review-star-2").addClass("bi-star-fill");
            $("#review-star-3").addClass("bi-star-fill");
            $("#review-star-4").addClass("bi-star");
            $("#review-star-5").addClass("bi-star");
            
            $("#review-radio-3").prop("checked", true);
        }
        else if (id == "review-star-4"){
            $("#review-star-1").addClass("bi-star-fill");
            $("#review-star-2").addClass("bi-star-fill");
            $("#review-star-3").addClass("bi-star-fill");
            $("#review-star-4").addClass("bi-star-fill");
            $("#review-star-5").addClass("bi-star");
            
            $("#review-radio-4").prop("checked", true);
        }
        else if (id == "review-star-5"){
            $("#review-star-1").addClass("bi-star-fill");
            $("#review-star-2").addClass("bi-star-fill");
            $("#review-star-3").addClass("bi-star-fill");
            $("#review-star-4").addClass("bi-star-fill");
            $("#review-star-5").addClass("bi-star-fill");
            
            $("#review-radio-5").prop("checked", true);
        }
    });
    
    $("#rating-clear").click(function () {
        $("#review-star-1").addClass("bi-star");
        $("#review-star-2").addClass("bi-star");
        $("#review-star-3").addClass("bi-star");
        $("#review-star-4").addClass("bi-star");
        $("#review-star-5").addClass("bi-star");

        $("#review-radio-0").prop("checked", true);
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