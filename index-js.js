// =========================================
// ===== FORM VALIDATION USING JQUERY ======
// =========================================

$(document).ready(function() {
    $("#register").click(function() {
        var name = $("#name1").val();
        var email = $("#email1").val();
        var password = $("#pass2").val();
        if (name == '' || email == '' || password == '') {
            alert("User! Please enter your name!");
        }
        else if ((password.length) < 8) {
            alert("Password should atleast 8 character in length...!!!!!!");
        }
        else {
            $.post("index.php", {
            name1: name,
            email1: email,
            password1: password
            }, function(data) {
                if (data == 'You have Successfully Registered.....') {
                    $("form")[0].reset();
                }
                alert(data);
            });
        }
    });
});