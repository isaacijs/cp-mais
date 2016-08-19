<?php
ob_start();
session_start();
require_once './_app/Config.inc.php';

$setExe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);
$dataPost = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if ($setExe === 'logoff' || $setExe === 'restrito'):
    unset($_SESSION['userlogin']);
endif;

if (isset($_SESSION['userlogin'])):
    $userType = (int) $_SESSION['userlogin']['user_type'];
    header('Location: ./quizz/index.php');
endif;

if ($dataPost and isset($dataPost['SendLogin'])):
    $fazerlogin = new Login;
    $fazerlogin->ExeLogin($dataPost);
    if($fazerlogin->getResult()):
        header("location: admin.php");
    endif;
endif;

if ($dataPost and isset($dataPost['SendSignUp'])):
    unset($dataPost['SendSignUp']);
    if ($dataPost['user_password'] === $dataPost['user_password2']):
        unset($dataPost['user_password2']);
        $NewUser = new cadUser;
        $dataPost['user_level'] = 10;
        $NewUser->ExeCreate($dataPost);
     endif;
endif;
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

        <script type="text/javascript" src="./asset/_cdn/lib/jquery.js"></script>
        <script type="text/javascript" src="./asset/_cdn/controlMaisFnc.js"></script>

        <title>Control MAIS | Faça seu Login</title>
    </head>

    <body>
        <h1>Controle Financeiro familiar MAIS</h1>

        <div id="msgSystem" class="">
            <?php
            if(!empty($NewUser)):
                  echo $NewUser->getError();  
            endif;
            ?>
        </div>

        <div id="loginBox" class="">
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
                    <input type="submit" id="" class="" name="SendLogin" value="Fazer Login">
                </div>
            </form>
            <a id="signupShow" class="">Criar um registro</a>
        </div>

        <div id="signupBox" class="">
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
                    <input type="submit" id="" class="" name="SendSignUp" value="Cadastrar">
                </div>
            </form>
            <a id="loginShow" class="">Fazer Login</a>
        </div>
    </body>
</html>