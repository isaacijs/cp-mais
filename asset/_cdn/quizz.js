$(function ($) {
    $("#quizz-window").hide();

    $("#fechar").click(function () {
        $("#quizz-window").fadeOut();
    });
});

function quizzVer(idQuestion) {
    $.ajax({
        url: "../asset/ajax/activityVeiw.ajax.php?key=" + idQuestion,
        dataType: 'json',
        data: data,
        success: success
    });

    $.getJSON(data, function (jd) {
        $("#qr-pergunta").html(jd);
    });
    $("#quizz-window").fadeIn();
}