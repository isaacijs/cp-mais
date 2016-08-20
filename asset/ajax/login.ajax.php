<?php
require_once '../../_app/Config.inc.php';

$dataLogin = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if (!empty($dataLogin)):
    $login = new Login;
    $login->ExeLogin($dataLogin);

    if (!$login->getResult()):
        echo 'FALSE';
    else:
        echo $_SESSION['userlogin']['user_type'];
    endif;
endif;