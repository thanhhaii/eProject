$(document).ready(function() {
    var page = 1;
    $("#seemore").click(function () {
        page++;
        $.ajax({
            url: '../ajax/indexajax.php',
            type: 'GET',
            data: {page: page},
            success: function (result) {
                $("#show-product").append(result);
            }
        });
        if(page == 4){
            $('#seemore').css('visibility','hidden');
        }
    });
    $('.category_id').click(function () {
        var category_id = $(this).attr("id");
        console.log(category_id);
        $.ajax({
            url: '../ajax/indexajax.php',
            type: 'GET',
            data: {category: category_id},
            success: function (result) {
                $("#show-product").html(result);
            }
        });
        $('#seemore').css('visibility','hidden');
    })
    $('#search_button').click(function () {
        var search = $('#search').val();
        $.ajax({
            url: '../ajax/indexajax.php',
            type: 'GET',
            data: {search: search},
            success: function (result) {
                $("#show-product").html(result);
            }
        });
        $('#seemore').css('visibility','hidden');
    });
});
