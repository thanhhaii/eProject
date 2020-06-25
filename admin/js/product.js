function ajaxOneVal(a,query){
    $.ajax({
        url: '../ajax/ajaxproduct.php', type: 'POST',
        data:{[a]: query},
        success: function (result) {$('#showproduct').html(result);}
    });
};
function ajaxTwoVal(a,query,b,query2){
    $.ajax({
        url: '../ajax/ajaxproduct.php', type: 'POST',
        data:{[a]: query, [b]: query2},
        success: function (result) {$('#showproduct').html(result);}
    });
};

$(document).ready(function () {
    $(".product").addClass("active");
    $(".category").click(function () {
        $('.category').addClass('active');
        $(".product").removeClass("active");
        $('.img_pro').removeClass("active");
        $(".add_button").html('Add Category').attr('href','actionCategory.php');
        $('.search').val('category');
        ajaxOneVal("queryCategory","SELECT * FROM category");
    });
    $(".product").click(function () {
        $('.category').removeClass('active');
        $(".product").addClass("active");
        $('.product').attr('href',"actionProduct.php");
        $('.img_pro').removeClass("active");
        $(".add_button").html('Add Product').attr('href','actionProduct.php');
        $('.search').val('product');
        ajaxOneVal("queryProduct","SELECT * FROM product");
    });
    $(".img_pro").click(function () {
        $('.category').removeClass('active');
        $(".img_pro").addClass("active");
        $('.product').removeClass("active");
        $(".add_button").html('Add Image');
        $('.search').val('image');
        ajaxOneVal("queryImageProduct","SELECT DISTINCT(id_product) FROM image");
    });
    $("td > button").click(function () {
        var id_pro = $(this).attr('id')
        var r = confirm("If you delete the product, the image will also be deleted. The best way is that you should hide it in the product editing! Do you still want to delete this product?");
        if(r == true ){
            ajaxTwoVal('id',id_pro,'queryProduct',"SELECT * FROM product")
        } else {

        }
    });

    $('.search').click(function () {
        var valSearch = $(".input-search").val();
        var a =  $(".search").val();
        if( a == 'category') {
            ajaxTwoVal('queryCategory',"SELECT * FROM category",'search',valSearch)
        };
        if( a == 'product') {
            ajaxTwoVal('queryProduct',"SELECT * FROM product",'search',valSearch)
        };
        if( a == 'image') {
            ajaxTwoVal('queryImageProduct',"SELECT DISTINCT(id_product) FROM image",'search',valSearch)
        };
    });
});