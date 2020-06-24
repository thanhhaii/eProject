$(document).ready(function () {
    $(".product").addClass("active");
    $(".category").click(function () {
        $('.category').addClass('active');
        $(".product").removeClass("active");
        $('.img_pro').removeClass("active");
        $(".add_button").html('Add Category');
        $.ajax({
            url: '../ajax/ajaxcategory.php',
            type: 'POST',
            data:{queryCategory: "SELECT * FROM category"},
            success: function (result) {
                $('#showproduct').html(result);
            }
        });
    });
    $(".product").click(function () {
        $('.category').removeClass('active');
        $(".product").addClass("active");
        $('.product').attr('href',"actionProduct.php");
        $('.img_pro').removeClass("active");
        $(".add_button").html('Add Product');
        $.ajax({
            url: '../ajax/ajaxcategory.php',
            type: 'POST',
            data:{queryProduct: "SELECT * FROM product"},
            success: function (result) {
                $('#showproduct').html(result);
            }
        });
    });
    $(".img_pro").click(function () {
        $('.category').removeClass('active');
        $(".img_pro").addClass("active");
        $('.product').removeClass("active");
        $(".add_button").html('Add Image');
        $.ajax({
            url: '../ajax/ajaxcategory.php',
            type: 'POST',
            data:{queryImageProduct: "SELECT DISTINCT(id_product) FROM image"},
            success: function (result) {
                $('#showproduct').html(result);
            }
        });

    });
    $(".search").click(function () {
        var valueSearch = $(".input-search").val();
        $.ajax({
            url: '../ajax/ajaxcategory.php',
            type: 'POST',
            data: {search: valueSearch},
            success: function (result) {
                $("#showaccount").html(result);
            }
        });
    });
    $("td > button").click(function () {
        var id_pro = $(this).attr('id')
        var r = confirm("If you delete the product, the image will also be deleted. The best way is that you should hide it in the product editing! Do you still want to delete this product?");
        if(r == true ){
            $.ajax({
                url: '../ajax/ajaxcategory.php',
                type: 'POST',
                data:{
                    id: id_pro,
                    queryProduct: "SELECT * FROM product"
                },
                success: function (result) {
                    $('#showproduct').html(result);
                }
            });
        } else {

        }
    });
});