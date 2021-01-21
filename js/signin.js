$(function(){
    $("#form").submit(function(e){
        e.preventDefault();
        $("#spinner").removeClass("fade");
        $('.alert').removeClass("show");
        $.ajax({
            type: "POST",
            url: "php/signin.php",
            data: {
                'loginOrEmail' : $("#loginOrEmail").val(),
                'password' : $("#password").val(),
            },
            success: function(response) {
                console.log(response);
                var jsonResponse = JSON.parse(response);               
                if (jsonResponse.success == 1) {
                    document.location.href = "admin.php";
                } 
                else if (jsonResponse.success == 2) {
                    document.location.href = "index.php";
                }
                else {
                    $("#password").val("");
                    $('.alert').addClass("show");
                    
                }
                $("#spinner").addClass("fade");
            }
        });
    });
    
});