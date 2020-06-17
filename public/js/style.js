$(document).ready(function() {
    var page = 1;
    $("#seemore").click(function () {
        page++;
        $.ajax({
            url: 'indexajax.php',
            type: 'GET',
            data: {page: page},
            success: function (result) {
                $("#show-product").append(result);
            }
        });
    });
    $('.category_id').click(function () {
        var category_id = $(this).attr("id");
        console.log(category_id);
        $.ajax({
            url: 'indexajax.php',
            type: 'GET',
            data: {category: category_id},
            success: function (result) {
                $("#show-product").html(result);
            }
        });
        $('#seemore').css('visibility','hidden');
    })
});