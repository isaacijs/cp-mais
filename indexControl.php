<?php
ob_start();
session_start();
$setExe = filter_input(INPUT_GET, 'exe', FILTER_DEFAULT);

if ($setExe === 'logoff' || $setExe === 'restrito'):
    unset($_SESSION['userlogin']);
endif;

if (isset($_SESSION['userlogin'])):
    $userType = (int) $_SESSION['userlogin']['user_type'];
    if ($userType == 20):
        header('Location: ./admin/index.php');
    elseif ($userType == 10):
        header('Location: ./quizz/index.php');
    endif;
endif;