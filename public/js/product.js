$(document).ready(function () {
    var quantity = $("#quantity").val();
    var product_quantity = $("#quantity_product").val();
    console.log(product_quantity);
    $('#plus').click(function () {
        if(quantity < product_quantity){
            quantity = Number(quantity) + 1;
            $("#quantity").val(quantity);
        }else if (quantity == product_quantity){
            quantity;
            $("#quantity").val(quantity);
        }
    });
    $('#minus').click(function () {
        if(quantity == 1){
            quantity = 1;
        }else if(quantity > 1) {
            quantity = Number(quantity) - 1;
            $("#quantity").val(quantity);
        }
    });
});