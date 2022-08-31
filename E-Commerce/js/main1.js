/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function ()
{
    dropdown();
    removeitems();
    removeindiv();
    quantitypluscounter();
    quantityminuscounter();
    carttotalamount();
    updateDB();
    
    if ($("div").hasClass("drop-cart-image"))
    {
        $("#cart-head").css("display", "none");
        $("#shopping-cart-header-empty").css("display", "none");
    } else
    {
        $(".cart-page").css("display", "none");
        $("#cart-head").css("display", "block");
        $("#cart-head").css("margin-bottom", "80px");
        $("#shopping-cart-header-empty").css("display", "block");
    }

    cartpagetotalamount();
    ccvalidation();

});

function dropdown()
{
    $('#cart').on("click", function ()
    {
        $(".drop-shopping-cart").toggle();
    });
}

function carttotalamount()
{
    var total = [];
    var quantity = [];
    const itemsamount = document.querySelectorAll(".cart-price");
    const quantityamount = document.querySelectorAll(".item-quantity");

    itemsamount.forEach(function (item)
    {
        total.push(parseInt(item.textContent));

    });
    quantityamount.forEach(function (item)
    {
        quantity.push(parseInt(item.textContent));
    });

    const totalQuantity = quantity.reduce(function (quantity, count)
    {
        quantity += count;
        return quantity;
    }, 0);
    const totalAmount = total.reduce(function (total, item)
    {
        total += item;
        return total;
    }, 0);

    $(".total-price").text(totalAmount);
    $(".quantity").text(totalQuantity);
}

function cartpagetotalamount()
{
    var total = [];
    var quantity = [];
    const itemsamount = document.querySelectorAll(".cart-page-price");
    const quantityamount = document.querySelectorAll(".cart-page-count");

    quantityamount.forEach(function (count)
    {
        quantity.push(parseInt(count.textContent));
    });
    itemsamount.forEach(function (item)
    {
        total.push(parseInt(item.textContent));
    });

    const totalQuantity = quantity.reduce(function (quantity, count)
    {
        quantity += count;
        return quantity;
    }, 0);

    const totalAmount = total.reduce(function (total, item)
    {
        total += item;
        return total;
    }, 0);

    $(".cart-page-totalprice").text(totalAmount);
    $(".order-page-totalprice").text(totalAmount);
    $(".cart-page-totalquantity").text(totalQuantity);

    if (window.location.href.indexOf("orderpage.php") > -1)
    {

        var shippingamount = parseInt(document.querySelector(".shipping-fee").textContent);
        var grandTotal = shippingamount + totalAmount;

        $(".totalamount").text(grandTotal);
    }

}


function removeitems()
{
    $("#removeall").on("click", function ()
    {
        var confirmation = window.confirm(":( Do you really want to remove all items?");
        if (confirmation)
        {
            $.ajax({
                url: "divcreate.php",
                method: "POST",
                data: {action: "deleteall"},
                success: function ()
                {
                    location.reload();
                }
            });
        }
    });
    $(".order-page-checkoutbutton").on("click", function ()
    {
        var cardnum = $("#cardnum");
        var validcard = $.payform.validateCardNumber(cardnum.val());
        
        if (validcard == false)
        {
            $("#cardnum").val("Wrongformat");
        }
        else if (validcard == true)
        {
            $.ajax({
                url: "divcreate.php",
                method: "POST",
                data: {action: "deleteall"},
            });
            carttotalamount();
        }
    });
}

function removeindiv()
{
    $(".cart-page-remove").on("click", function ()
    {
        var div = $(this).parent('.cart-page-productprice').parent('.col-sm').parent('.cart-page-items').attr('id');
        var confirmation = window.confirm(":( Remove?");

        if (confirmation)
        {
            $.ajax({
                url: "divcreate.php",
                method: "POST",
                data: {action: "deleteindiv", id: div},
                success: function ()
                {
                    location.reload();
                }
            });
        }
    });
}
function updateDB()
{
    $(".cart-page-checkoutbutton").on("click", function ()
    {
        var quantity = [];
        var updatedprice = [];
        var id = [];
        var count = 0;
        const quantityamt = document.querySelectorAll(".cart-page-count");
        const totalprice = document.querySelectorAll(".cart-page-price");

        $(".cart-page-items").each(function () {
            id[count++] = $(this).attr("id");
        });

        quantityamt.forEach(function (count)
        {
            quantity.push(parseInt(count.textContent));
        });
        totalprice.forEach(function (item)
        {
            updatedprice.push(parseInt(item.textContent));
        });

        $.ajax({
            url: "divcreate.php",
            method: "POST",
            data: {action: "updateDB", id: id, quantity: quantity, price: updatedprice},
            success: function ()
            {
                document.location.href = "orderpage.php";
            }
        });

    });
}

function quantitypluscounter()
{
    $(".cart-page-counter-btn-plus").on("click", function ()
    {
        var count = parseInt($(this).siblings('.cart-page-count').text());
        var price = parseInt($(this).parent('.cart-page-counter').parent('.col-sm').siblings('.col-sm').find('.cart-page-productprice').find('.cart-page-price').text());
        var product = $(this).parent('.cart-page-counter').parent('.col-sm').parent('.cart-page-items').attr("id");
        const itemsamount = document.querySelectorAll(".item-name");

        var originalprice = price / count;

        count += 1;
        var updatedprice = originalprice * count;

        $(this).siblings(".cart-page-count").text(count);
        $(this).parent('.cart-page-counter').parent('.col-sm').siblings('.col-sm').find('.cart-page-productprice').find('.cart-page-price').text(updatedprice);
        cartpagetotalamount();

        $(".item-name").each(function () {
            id = $(this).attr("id");
            if (id === product)
            {
                $(this).siblings('.item-quantity').text(count);
                $(this).siblings('.cart-price').text(updatedprice);
                carttotalamount();
            }
        });
    });

}

function quantityminuscounter()
{
    $(".cart-page-counter-btn-minus").on("click", function ()
    {
        var count = parseInt($(this).siblings('.cart-page-count').text());
        if (count != 1)
        {
            var price = parseInt($(this).parent('.cart-page-counter').parent('.col-sm').siblings('.col-sm').find('.cart-page-productprice').find('.cart-page-price').text());
            var product = $(this).parent('.cart-page-counter').parent('.col-sm').parent('.cart-page-items').attr("id");

            const itemsamount = document.querySelectorAll(".item-name");

            var originalprice = price / count;

            count -= 1;
            var updatedprice = originalprice * count;

            $(this).siblings(".cart-page-count").text(count);
            $(this).parent('.cart-page-counter').parent('.col-sm').siblings('.col-sm').find('.cart-page-productprice').find('.cart-page-price').text(updatedprice);
            cartpagetotalamount();

            $(".item-name").each(function () {
                id = $(this).attr("id");
                if (id === product)
                {
                    $(this).siblings('.item-quantity').text(count);
                    $(this).siblings('.cart-price').text(updatedprice);
                    carttotalamount();
                }
            });
        }
    });
}



function ccvalidation()
{
    $("#cardnum").keyup(function ()
    {
        $(".fa-custom-visa").css("opacity", "1");
        $(".fa-custom-master").css("opacity", "1");
        $(".fa-custom-amex").css("opacity", "1");

        var cardNumber = $("#cardnum");
        $("#cardnum").payform(cardNumber);

        if ($.payform.parseCardType(cardNumber.val()) === 'visa')
        {
            $(".fa-custom-master").css("opacity", "0.2");
            $(".fa-custom-amex").css("opacity", "0.2");
        } else if ($.payform.parseCardType(cardNumber.val()) === 'mastercard')
        {
            $(".fa-custom-visa").css("opacity", "0.2");
            $(".fa-custom-amex").css("opacity", "0.2");
        } else if ($.payform.parseCardType(cardNumber.val()) === 'amex')
        {
            $(".fa-custom-visa").css("opacity", "0.2");
            $(".fa-custom-master").css("opacity", "0.2");
        }
    });
}

