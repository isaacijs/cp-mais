<?php
/*chama o arquivo em php com funções*/
require_once './indexControl.php';
?>
<!DOCTYPE html>
<html>
    <head> 
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0.0"/>
        <meta name="description" content="???" />
        <meta name="keywords" content="???"/>
        <meta name="author" content="Isaac Silvério, Michael Alves" />
        <meta name="robots" content="noindex, nofollow" />

        <link rel="shortcut icon" href=""/>

        <link rel="stylesheet" type="text/css" href="asset/css/bootstrap.css"/>

        <script type="text/javascript" src="asset/_cdn/lib/jquery.js"></script>

        <title>Control MAIS | Faça seu Login</title>
    </head>

    <body>
        <h1>Controle Financeiro familiar MAIS</h1>
        <div id="LoginBox" class="">
            <h2>Login</h2>
            <form id="" class="" method="POST" action="" enctype="multipart/form-data">
                <div id="" class="">
                    <label for="user_login">Usuário: </label>
                    <input type="text" name="user_login" id="user_login" placeholder="E-mail/Usuário" required />
                </div>
                <div id="" class="">
                    <label for="user_login">Senha: </label>
                    <input type="password" name="user_password" id="user_password" placeholder="Senha" required />
                </div>
                <div id="" class="">
                    <button id="" class="">Fazer Login</button>
                </div>
            </form>
            <a href="#" id="signUp" class="">Criar um registro</a>
        </div>

        <div id="LoginBox" class="">
            <h2>Cadastro</h2>
            <form id="" class="" method="POST" action="" enctype="multipart/form-data">
                <div id="" class="">
                    <label for="user_name">Nome: </label>
                    <input type="text" name="user_name" id="user_name" placeholder="Nome" required />
                </div>
                <div id="" class="">
                    <label for="user_name">Login/Usuário: </label>
                    <input type="text" name="user_login" id="user_login" placeholder="Usuário" required />
                </div>
                <div id="" class="">
                    <label for="user_email">E-mail: </label>
                    <input type="text" name="user_email" id="user_email" placeholder="E-mail" required />
                </div>
                <div id="" class="">
                    <label for="user_password">Senha: </label>
                    <input type="password" name="user_password" id="user_password" placeholder="Senha" required />
                </div>
                <div id="" class="">
                    <label for="user_password">Repita a Senha: </label>
                    <input type="password" name="user_password2" id="user_password" placeholder="Senha" required />
                </div>
                <div id="" class="">
                    <button id="" class="">Fazer Login</button>
                </div>
            </form>
            <a href="#" id="signUp" class="">Fazer Login</a>
        </div>
    </body>
</html>