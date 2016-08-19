$(function ($) {
    /* ################ CAIXAS DE CADSTRO E LOGIN ################# */

    /* - Oculta a caixa de cadastro - */
    $("#signupBox").hide();

    /* - Oculta a caixa de login e mostra a caixa de cadastro - */
    $("#signupShow").click(function () {
        $("#loginBox").fadeOut();
        $("#signupBox").fadeIn();
    });

    /* - Mostra a caixa de login e Oculta a caixa de cadastro - */
    $("#loginShow").click(function () {
        $("#loginBox").fadeIn();
        $("#signupBox").fadeOut()();
    });

    /* ############## FIM CAIXAS DE CADSTRO E LOGIN ############### */
});


//modelos de Comentários
/*
 * ############################################################ 
 */
/*############################################################  */ 