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
        if(page == 4){
            $('#seemore').css('visibility','hidden');
        }
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
    $('#search_button').click(function () {
        var search = $('#search').val();
        $.ajax({
            url: 'indexajax.php',
            type: 'GET',
            data: {search: search},
            success: function (result) {
                $("#show-product").html(result);
            }
        });
        $('#seemore').css('visibility','hidden');
    });
});

var dropdowns = $(".dropdown");

// Onclick on a dropdown, toggle visibility
dropdowns.find("dt").click(function(){
    dropdowns.find("dd ul").hide();
    $(this).next().children().toggle();
});

// Clic handler for dropdown
dropdowns.find("dd ul li a").click(function(){
    var leSpan = $(this).parents(".dropdown").find("dt a span");

    // Remove selected class
    $(this).parents(".dropdown").find('dd a').each(function(){
        $(this).removeClass('selected');
    });

    // Update selected value
    leSpan.html($(this).html());

    // If back to default, remove selected class else addclass on right element
    if($(this).hasClass('default')){
        leSpan.removeClass('selected')
    }
    else{
        leSpan.addClass('selected');
        $(this).addClass('selected');
    }

    // Close dropdown
    $(this).parents("ul").hide();
});

// Close all dropdown onclick on another element
$(document).bind('click', function(e){
    if (! $(e.target).parents().hasClass("dropdown")) $(".dropdown dd ul").hide();
});