$(function ($) {
    $("#loginLoad").hide();
    $("#load-loader").hide();
    $("#loginMsg").hide();

    $("#sendLogin").click(function () {
        $("#loginLoad").fadeIn();
        $("#loginMsg").hide();
        var envio = $.post("./asset/ajax/login.ajax.php", {
            user_email: $("#user_email").val(),
            user_password: $("#user_password").val()
        })
        envio.done(function (data) {
            if (data === '20') {
                document.location = './admin/index.php';
            } else if (data === '10') {
                document.location = './quizz/index.php';
            } else {
                $("#loginMsg").fadeIn();
                $("#loginLoad").fadeOut();
            }
        })
        envio.fail(function () {
            alert("Erro na requisição");
        })
    });

    $("#user_email").blur(function () {
        $("#load-loader").fadeIn();

        var envio = $.post("./asset/ajax/photo.ajax.php", {
            user_email: $("#user_email").val()
        })
        envio.done(function (data) {
            if (data !== 'FALSE') {
                $("#user_photo").attr("src", "./uploads/" + data);
            }
        })
        envio.fail(function () {
            alert("Erro na requisição");
        })

        $("#load-loader").fadeOut();
    });

//Nova Sala
    var idSala;
    $("#NovaSala").click(function () {

        var envio = $.post("../asset/ajax/classNew.ajax.php", {
            class_name: $("#class_name").val(),
            class_amounts: $("#class_amounts").val()
        })
        envio.done(function (data) {
            $("#nome-sala").text($("#class_name").val());
            $('#modal-nova-sala').modal();
            idSala = data;
        })
        envio.fail(function () {
            alert("Erro na requisição");
        })
    });
// FIM Nova Sala

    $("#cancel").click(function () {
        document.location = 'index.php';
    });

    $("#IniciarSala").click(function () {
        document.location = 'index.php?getPag=clsNow&id=' + idSala;
    });

});