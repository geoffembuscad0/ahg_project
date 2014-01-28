function loginAccount(username, password){
    var user_input = { 
            'username': username,
            'password': password
        };
        
        $.ajax({
            url: 'validate_login',
            data: user_input,
            type: 'POST',
            success: function(loginResponse){
                $("#login_msg").html(loginResponse);
            }
        });
}

$(document).ready(function(){
    // If login button is clicked
    $("#validateLoginBtn").on('click', function(){
        loginAccount($("input[name='student_id']").val(),$("input[name='password']").val());
    });
    
    // if press enter in the form
    $("#loginForm input").keypress(function (event) {
        if (event.keyCode == 10 || event.keyCode == 13) {
            loginAccount($("input[name='student_id']").val(),$("input[name='password']").val());
        }
    });
});
// Geoff Updated Added New File December 16