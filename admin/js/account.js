$(document).ready(function () {
    $('.client').click(function () {
        $(".client").addClass('active');
        $.ajax({
            url: '../ajax/ajaxaccount.php',
            type: 'POST',
            data: {query: 'SELECT * FROM account where roles = "client"'},
            success: function (result) {
                $("#showaccount").html(result);
            }
        });
    });
    $('.all').click(function () {
        $(".all").addClass('active');
        $.ajax({
            url: '../ajax/ajaxaccount.php',
            type: 'POST',
            data: {query: 'SELECT * FROM account'},
            success: function (result) {
                $("#showaccount").html(result);
            }
        });
    });
    $('.admin').click(function () {
        $(".admin").addClass('active');
        $.ajax({
            url: '../ajax/ajaxaccount.php',
            type: 'POST',
            data: {query: 'SELECT * FROM account where roles = "admin"'},
            success: function (result) {
                $("#showaccount").html(result);
            }
        });
    });
    $(".search").click(function () {
        var valueSearch = $(".input-search").val();
        $.ajax({
            url: '../ajax/ajaxaccount.php',
            type: 'POST',
            data: {search: valueSearch},
            success: function (result) {
                $("#showaccount").html(result);
            }
        });
    });
});