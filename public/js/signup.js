$(document).ready(function () {
    $('#username').blur(function () {
        var username = $("#username").val();
        $.ajax({
            type: 'POST',
            url: '../ajax/signupajax.php',
            data: {username: username},
            success: function (result) {

            }
        });
    });
});