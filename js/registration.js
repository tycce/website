var user_login = $("#user_login");
var user_email = $("#user_email");
var user_firstname = $("#user_firstname");
var user_lastname = $("#user_lastname");
var user_password = $("#user_password");
var enterPassword = $("#enterPassword");
var day = $("#day");
var month = $("#month");
var year = $("#year");


$(function(){
    //События
    $(user_firstname).on("keyup", function() {
        nameReg(this) ? removeCls(this) : $(this).addClass("is-invalid");
    });
    $(user_lastname).on("keyup", function() {
        nameReg(this) ? removeCls(this) : $(this).addClass("is-invalid");
    });
    $(user_login).on("change", ajax_checkLogin);

    $(user_email).on("keyup", function() {
        emailReg(this) ? $(this).removeClass("is-invalid") : $(this).addClass("is-invalid");
    });
    $(user_email).on("change", ajax_checkEmail);
    $(user_password).on("keyup", checkPassword);
    $(enterPassword).on("keyup", checkPassword);

    // отправка формы
    $(form).submit(function (e) {  
        e.preventDefault();        
        ajax_registration();     
    });

    // Убрать invalid с пустых полей
    $("input").on("keyup", function(){
        if($(this).val()==""){
           removeCls(this);
        }
    });

});

// Формируем данные с формы для отправки
function getData() {
    let dataArr = {
        'user_login' : $(user_login).val(),
        'user_email' : $(user_email).val(),
        'user_password' :  $(user_password).val(),
        'user_firstname' :  $(user_firstname).val(),
        'user_lastname' :  $(user_lastname).val(),
        'user_birthday' : $(year).val() + "-" + $(month).val() + "-" + $(day).val(),
    }
    return dataArr;
}

var ajax_query = false;
// ajax-регистрация
function ajax_registration() {
    if(!ajax_query && emptyInput()) {
        ajax_query = true;
        let dataArr = getData();
        $.ajax({
            type: "POST",
            url: "php/Registration/registration.php",
            data: dataArr,
            success: function(response) {
                var jsonResponse = JSON.parse(response);
                if(jsonResponse.success == "1") {
                    document.location.href = "enter.php";
                } else {
                    console.log("ERORO");
                }
                ajax_query = false;
            }
        });
    }
}

// Подтверждение пароля
function checkPassword() {
    reg = /^[a-zA-z0-9]{6,16}$/;

    reg.test($(user_password).val()) ? $(user_password).removeClass("is-invalid") : $(user_password).addClass("is-invalid"); 
    if($(user_password).val() == $(enterPassword).val() && !$(user_password).hasClass("is-invalid")) {
        $(enterPassword).removeClass("is-invalid");
        $(user_password).removeClass("is-invalid");
    }
    else {
        $(enterPassword).addClass("is-invalid");       
    }
}

// ajax-проверка логина
function ajax_checkLogin() {
    let input = this;
    removeCls(input);
    if($(input).val() == "") return;

    $(input).siblings(".spinner-border").css("display", "block");
    $.ajax({
        type: "POST",
        url: "php/Registration/checkLogin.php",
        data: {
            'input' : $(input).val(),
        },
        success: function(response) {
            $(input).siblings(".spinner-border").css("display", "none");
            var jsonResponse = JSON.parse(response);
            if(jsonResponse.success == "isHave") {
                $(input).addClass("is-invalid");
                $(input).remove("is-valid");
            } 
            else if(jsonResponse.success == "isNotHave") {
                $(input).addClass("is-valid");
                $(input).remove("is-invalid");
            }
            else {
                console.log("error");
            }
            
        }
    });
}

// ajax-проверка email
function ajax_checkEmail() {
    let input = this;
    removeCls(input);
    if($(input).val()=="" || !emailReg(input)) return;

    $(input).siblings(".spinner-border").css("display", "block");
    $.ajax({
        type: "POST",
        url: "php/Registration/checkEmail.php",
        data: {
            'input' : $(input).val(),
        },
        success: function(response) {
            $(input).siblings(".spinner-border").css("display", "none");
            var jsonResponse = JSON.parse(response);
            if(jsonResponse.success == "isHave") {
                $(input).addClass("is-invalid");
                $(input).remove("is-valid");
            } 
            else if(jsonResponse.success == "isNotHave") {
                $(input).addClass("is-valid");
                $(input).remove("is-invalid");
            }
            else {
                console.log("error");
            }
        }
    });
}

// Проверка на пустые поля
function emptyInput() {
    let inputs = $("input");
    let valid = true;
    $.each(inputs, function (index) { 
        if(!$(inputs[index]).hasClass("is-invalid")) {
            if($(inputs[index]).val() == "") {
               $(inputs[index]).addClass("is-invalid");
               $(inputs[index]).removeClass("is-valid");
                valid = false;
            }
            else{
                $(inputs[index]).addClass("is-valid");
                $(inputs[index]).removeClass("is-invalid");
            }     
        } else valid = false;       
    });
    return valid;
}

// pattern Имени и фамилии
function nameReg(input) {
    let reg = /^[a-zA-Zа-яА-я]{0,15}$/;
    return reg.test($(input).val()) ? true : false;
}

// pattern email
function emailReg(input) {
    let reg = /^[a-zA-Z0-9_.-]{0,17}[@][a-zA-Z]{1,10}[.][a-zA-Z]{1,5}$/;
    return reg.test($(input).val()) ? true : false;
}

// Удалить классы valid и invalid
function removeCls(input) {
    $(input).removeClass("is-valid");
    $(input).removeClass("is-invalid");
}




