//creating a new order
$(document).ready(function () {
    $(".add-product-btn").on("click", function (e) {
        e.preventDefault();
        var name = $(this).data("name");
        var id = $(this).data("id");
        var max = $(this).data("max");
        var price = $(this).data("price");

        $(this)
            .removeClass("btn-success")
            .addClass("btn-default disabled");

        // <input type="hidden" name="products[]" value="${id}" >
        var html = `<tr>
                    <td> ${name} </td> 
                    <td><input type="number" name="products[${id}][quantity]" max="${max}" data-price="${price}" class="form-control input-sm PQuantity" min="1" value="1">  </td>
                    <td class="PPrice"> ${price} </td>
                    <td><button class="btn btn-danger btn-sm remove-product-btn" data-id = "${id}"><i class="fa fa-trash" aria-hidden="true"></i>
                    </button> </td>
                    </tr>  `;

        $(".order-list").append(html);
        calc_price();
    });

    $("body").on("click", ".disabled", function (e) {
        e.preventDefault();
    });

    //order products view
    $(".order-products").on("click", function (e) {
        e.preventDefault();
        var url = $(this).data("url");
        var method = $(this).data("method");
        $.ajax({
            url: url,
            method: method,
            success: function (data) {
                $("#orderProductList").empty();
                $("#orderProductList").append(data);
            }
        });
    });

    //when we remove product from our orders
    $("body").on("click", ".remove-product-btn", function (e) {
        e.preventDefault();
        var id = $(this).data("id");
        $(this)
            .closest("tr")
            .remove();
        $("#product" + id)
            .removeClass("btn-default disabled")
            .addClass("btn-success");
        calc_price();
    });

    //when we increase the quantity of products in a order we also need to clac its price , then find total price
    $("body").on("keyup change", ".PQuantity", function () {
        var quantity = parseInt($(this).val());

        var ProductPrice = $(this).data("price");

        $(this)
            .closest("tr")
            .find(".PPrice")
            .html(quantity * ProductPrice);
        calc_price();
    });

    $('.')
});

//claculate total price
function calc_price() {
    var price = 0;

    $(".order-list .PPrice").each(function (index) {
        price += parseInt($(this).html());
    });
    $(".total-price").html(price);
    if (price > 0) {
        $("#add-order-btn").removeClass("disabled");
    } else {
        $("#add-order-btn").addClass("disabled");
    }
}
