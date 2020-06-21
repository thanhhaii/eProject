$(document).ready(function () {
    var checkuser = false;
    var checkpass = false;
    var checkemail = false;
    var checkphone = false;

    $('#username').blur(function () {
        var username = $("#username");
        var errorUser = $("#errorUsername");
        var spaces = username.val().trim().lastIndexOf(' ');
        if(username.val().trim().length < 8){
            console.log(username.length);
            if(spaces >= 0  ){
                username.css("border","1px solid red");
                errorUser.css('display','inline');
                errorUser.html('The username contains at least 8 characters and has no spaces');
            }else {
                username.css("border","1px solid red");
                errorUser.css('display','inline');
                errorUser.html('The username contains at least 8 characters');
            }
        }else if(username.val().trim().length >= 8) {
            if(spaces >= 0  ){
                username.css("border","1px solid red");
                errorUser.css('display','inline');
                errorUser.html('Username cannot use spaces');
            }else {
                $.ajax({
                    type: 'GET',
                    url: '../ajax/signupajax.php',
                    data: {
                        username: username.val()
                    },
                    success: function (result) {
                        $('head').append(result);
                    }
                });
                return checkuser = true;
            }
        }
    });

    $("#password").blur(function () {
        var password = $("#password").val();
        if(password.trim().length < 8 ){
            $("#errorPassword").css('display','inline');
            $('#errorPassword').html("The username contains at least 8 characters")
            $("#password").css('border','1px solid red');
        }else {
            $("#errorPassword").css('display','none');
            $('#password').css('border','2px solid green');
            return checkpass = true;
        }
    });

    $("#email").blur(function () {
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
        var email = $("#email").val();
        if(reg.test(email) == false){
            $("#errorEmail").css('display','inline');
            $('#errorEmail').html('Invalid email. Ex: example@gmail.com');
            $('#email').css('border','1px solid red');
        }else {
            $("#errorEmail").css('display','none');
            $("#email").css('border','2px solid green');
            return checkemail = true;
        }
    })

    $("#phone").blur(function () {
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
        var mobile = $('#phone').val();
        if (vnf_regex.test(mobile) == false)
        {
            $("#errorPhone").css('display','inline');
            $('#errorPhone').html('Invalid phone number');
            $('#phone').css('border','1px solid red');
        }else{
            $("#errorPhone").css('display','none');
            $("#phone").css('border','2px solid green');
            return checkphone = true;
        }
    });

    $("form").submit(function () {
        if(checkuser == true & checkpass == true & checkemail == true & checkphone == true ){
            $('#submit').prop('disabled',true);
            return true;
        }else {
            if(checkphone != true){
                $("#errorPhone").css('display','inline');
                $('#errorPhone').html('Invalid phone number');
                $('#phone').css('border','1px solid red');
            }
            if(checkuser != true){
                $("#errorUsername").css('display','inline');
                $("#username").css('border','1px solid red');
                $("#errorUsername").html('Invalid username');
            }
            if(checkemail != true){
                $("#errorEmail").css('display','inline');
                $('#errorEmail').html('Invalid email. Ex: example@gmail.com');
                $('#email').css('border','1px solid red');
            }
            if(checkpass != true) {
                $("#errorPassword").css('display', 'inline');
                $('#errorPassword').html("The username contains at least 8 characters")
                $("#password").css('border', '1px solid red');
            }
            return false;
        }
    });
});













