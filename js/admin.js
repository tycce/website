// Кнопки добавить, изменить и удалить
var btnAdd = $('#btnAdd');
var btnEdit = $('#btnEdit');
var btnRemove = $('#btnRemove');

var form = $("#form");

// Модальное окно
var modal = $("#Modal");


//Отрабатываем после загрузки страницы
$(function(){
    
    //AJAX запрос на добавление новой рыбы если форма валидна
    $(form).submit(function (e) {
        e.preventDefault();
        if (verificationModal()) { // валидация формы        
            let dataArr = {
                'fish_id': $(modal).attr("data-fish_id"),
                'fish_name': $("#fish_name").val(),
                'fish_price': $("#fish_price").val(),
                'fish_size': $("#fish_size").val(),
                'fish_amount': $("#fish_amount").val(),
                'fish_type': $("#fish_type").val(),
                'fish_form': $("#fish_form").val(),
                'fish_img': $('#fish_img').attr("src").split("/").pop(),
                'action' : $(modal).attr("data-action"),
            };
            if (dataArr['action'] == "add") ajax_add(dataArr);
            else if (dataArr['action'] == "edit") ajax_edit(dataArr);
            else if (dataArr['action'] == "remove") ajax_remove(dataArr['fish_id']);
            else console.log("error");
            
        } 
    });

    // Выбор изображения
    $(modal).find("#selectImg").on('change',function(){
        var fileName = $(this).val().split("\\").pop();
        $('.modal-img').attr("src", "img/fish/" + fileName);
        $('.modal-img').css("display", "block");
        $('.custom-file-label').html(fileName);
    });

    //Клик не по таблице отменяет выделеную строку
    $(document).mouseup(function (e) { 
        var table = $("table"); 
        var btns = $("#btns");
        if (!$(modal).hasClass("show")) {
            if (!table.is(e.target) 
            && table.has(e.target).length === 0
            && !btns.is(e.target)
            && btns.has(e.target).length === 0            
            && modal.has(e.target).length ===0) {
            $('tbody tr').removeClass('selected-tr');
            btnRemove.attr("disabled", true);
            btnEdit.attr("disabled", true);
            }
        }  
    });

    select_tr("tbody tr");
    event_img("[data-img]");  
    btnEdit.on("click", fillModal);
    btnRemove.on("click", fillModal);
    modal.find('.modal-body input').on("keyup", defaultInput);
    modal.find('.modal-body input').on("change", defaultInput);
    modal.find('.modal-body select').on("change", defaultInput);
    modal.find('.modal-body #selectImg').on("change", defaultInput);

    modal.on("hide.bs.modal", clearModal);

});

// Заполнить формы добавления и удаления выбраной строкой
function fillModal() {

    let currentCol = $('tbody tr.selected-tr td');
    let colItem = [];
    for (var i = 0; i < 7; i++) {
        colItem.push($(currentCol[i]).text());           
    }
    colItem.push($(currentCol[7]).find("svg").attr("data-img"));

    let fish_id = $('tbody tr.selected-tr').attr("data-fish_id");
    $(modal).attr("data-fish_id", fish_id);

    $(modal).find('.modal-body #fish_name').val(colItem[1]);
    $(modal).find('.modal-body #fish_price').val(colItem[2]);
    $(modal).find('.modal-body #fish_size option[value='+colItem[3].toLowerCase()+']').prop('selected', true);
    $(modal).find('.modal-body #fish_amount').val(colItem[4]);
    $(modal).find('.modal-body #fish_type').val(colItem[5]);
    $(modal).find('.modal-body #fish_form').val(colItem[6]);
    $(modal).find('.modal-body #fish_img').attr("src", colItem[7]);
    $(modal).find('.modal-body #fish_img').css("display", "block");

    let itemId = $(this).attr("data-action");
    // Меняем стиль для окна удаления 
    if(itemId == "remove") {
        $(modal).attr("data-action", "remove")
        $(modal).find('.modal-body input').attr('disabled', true);    
        $(modal).find('.modal-body select').attr('disabled', true);   
        $(modal).find(".modal-title").html("Удалить");
        $(modal).find(".modal-footer button").html("Удалить");
        $(modal).find(".modal-footer button").addClass("btn-danger");
    } 
    // Меняем стиль для окна редактирования 
    else {
        $(modal).attr("data-action", "edit")
        $(modal).find('.modal-body input').attr('disabled', false);  
        $(modal).find('.modal-body select').attr('disabled', false);   
        $(modal).find(".modal-title").html("Изменить");    
        $(modal).find(".modal-footer button").html("Изменить");
        $(modal).find(".modal-footer button").addClass("btn-info");
    }
}


//Валидация модального окна при отправке
function verificationModal() {
    if($(modal).attr("data-action") == "remove") return true;
    else if($(modal).find('.modal-body #fish_name').val().trim() === ""
    || $(modal).find('.modal-body #fish_price').val().trim() === "0"
    || $(modal).find('.modal-body #fish_size').val() === "default"
    || $(modal).find('.modal-body #fish_amount').val().trim() === "0"
    || $(modal).find('.modal-body #fish_type').val().trim() === ""
    || $(modal).find('.modal-body #fish_form').val().trim() === ""
    || $(modal).find('.modal-body #fish_img').attr("src") === ""
    ) {
        checkInputs();
        return false;
    }
    else return true;
}

//Незаполненые input в красный цвет 
function checkInputs() {
    let checkInputs = modal.find('.modal-body input');

    if($("#fish_size").val() === "default") $("#fish_size").addClass("is-invalid");
    if($("#fish_amount").val() === "default") $("#fish_amount").addClass("is-invalid");
    checkInputs.each(function(index) {
        let currentInput = checkInputs[index];
        if(($(currentInput).val() === "" || $(currentInput).val() === "0")) {   
            $(currentInput).addClass("is-invalid");
        }
    });
}

//Стандартный цвет input Event:keyup
function defaultInput() {
    if($(this).val() != "") $(this).removeClass("is-invalid"); 
}

// Очищаем форму
function clearModal() {
    $(modal).attr("data-fish_id", 0);
    $(modal).attr("data-action", "add")
    $(modal).find(".modal-title").html("Добавить");  
    $(modal).find(".modal-footer button").html("Добавить"); 
    $(modal).find(".modal-footer button").removeClass("btn-info");
    $(modal).find(".modal-footer button").removeClass("btn-danger");
    $(modal).find(".modal-img").attr("src", "");
    $(modal).find(".custom-file-label").html("Выбрать");
    $(modal).find(".modal-img").css("display", "none");

    $(modal).find('#fish_name').val("");
    $(modal).find('#fish_price').val("0");
    $(modal).find('#fish_size').val("default");
    $(modal).find('#fish_amount').val("0");
    $(modal).find('#fish_type').val("");
    $(modal).find('#fish_form').val("");
    
    $(modal).find('.modal-body input').attr('disabled', false);    
    $(modal).find('.modal-body select').attr('disabled', false); 
    let inputs = $(modal).find("input");
    $(modal).find('#fish_size').removeClass("is-invalid"); 
    $(modal).find('#fish_amount').removeClass("is-invalid"); 
    inputs.each(function(index) {
        $(inputs[index]).removeClass("is-invalid"); 
    });
}

//Показываем img рыбы
function event_img(target) {
    $(target).on("click", function() {
        let imgPath = $(this).attr("data-img");
        $("#modalImage .modal-body img").attr("src", imgPath);
        let fishName = $($(this).parent().parent().find("td")[1]).text();
        $("#modalImage .modal-title").html(fishName);
    });
}

//Выбор строки
function select_tr(target) {
    $(target).on("click", function() {
        if($("tbody tr").hasClass("selected-tr")){
            $('tbody tr').removeClass('selected-tr');
            $(this).addClass('selected-tr');
        }else {
            $(this).addClass('selected-tr');
            btnRemove.attr("disabled", false);
            btnEdit.attr("disabled", false);
        }
    });
}

// ajax запрос на добавление данных
var ajax_query = false;
function ajax_add(dataArr) {  
    if(!ajax_query) {
        ajax_query = true;
        $.ajax({
            type: "POST",
            url: "php/admin/addFish.php",
            data: dataArr,
            success: function (response) {
                console.log(response);
                var jsonResponse = JSON.parse(response);
                // Добавляем данные
                if(jsonResponse.success == "1") {
                    $(".modal").modal("hide");
                    let number = $("#table tr:last td:first").text();
                    $("#table").append('<tr class="d-flex" data-fish_id='+ (Number(jsonResponse.fish_id) + 1 )+ '><td>'+ (++number) +
                    '</td><td>'+ dataArr["fish_name"] +
                    '</td><td class="lil-col">'+ dataArr["fish_price"] +
                    '</td><td class="lil-col">'+ dataArr["fish_size"] +
                    '</td><td class="lil-col">'+ dataArr["fish_amount"] +
                    '</td><td>'+ dataArr["fish_type"] +
                    '</td><td>'+ dataArr["fish_form"] +
                    '</td><td><svg class="show-fish" data-img="img/fish/'+dataArr["fish_img"]+'" data-toggle="modal" data-target="#modalImage" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/><path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/></svg></td>');
                    event_img("[data-img]:last")
                    select_tr("tbody tr:last")
                } 
                // Если данные уже есть увеличиваем кол-во на amount
                else if (jsonResponse.success == "2") {
                    let current_tr_td = $("[data-fish_id="+jsonResponse.fish_id + "]").find("td");
                    $(current_tr_td[4]).text(Number($(current_tr_td[4]).text()) + Number(dataArr["fish_amount"]));
                } 
                else {
                    console.log("error");
                }
                ajax_query = false;
            }
        });
    }
}

// ajax запрос на редактирование 
function ajax_edit(dataArr) {
    if(!ajax_query) {
        $.ajax({
            type: "POST",
            url: "php/admin/editFish.php",
            data: dataArr,
            success: function (response) {
                var jsonResponse = JSON.parse(response);
                if(jsonResponse.success == "1") {
                    $(".modal").modal("hide");
                    let colItem = $('tbody tr.selected-tr td');
                    $(colItem[1]).text(dataArr["fish_name"]);
                    $(colItem[2]).text(dataArr["fish_price"]);
                    $(colItem[3]).text(dataArr["fish_size"]);
                    $(colItem[4]).text(dataArr["fish_amount"]);
                    $(colItem[5]).text(dataArr["fish_type"]);
                    $(colItem[6]).text(dataArr["fish_form"]);
                    $(colItem[7]).find("svg").attr("data-img", "img/fish/" + dataArr["fish_img"]);
                } else {
                    console.log("error");
                }
                ajax_query = false;
            }
        });
    }
}

// ajax запрос на удаление
function ajax_remove(fish_id) {
    if(!ajax_query) {
        $.ajax({
            type: "POST",
            url: "php/admin/removeFish.php",
            data: {
                'fish_id' : fish_id,
                'action' : "remove",
                },
            success: function (response) {
                var jsonResponse = JSON.parse(response);
                if(jsonResponse.success == "1") {
                    $(".modal").modal("hide");
                    let next_td_all = $("tbody tr.selected-tr").nextAll().find("td:first");
                    $("tbody tr.selected-tr").remove(); 
                            
                    for(let i = 0; i < next_td_all.length; i++) 
                        $(next_td_all[i]).text($(next_td_all[i]).text() - 1);
                } else {
                    console.log("error");
                }
                ajax_query = false;
            }
        });
    }
}


