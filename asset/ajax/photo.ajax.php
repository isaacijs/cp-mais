<?php

require_once '../../_app/Config.inc.php';

$dataEmail = filter_input(INPUT_POST, 'user_email', FILTER_VALIDATE_EMAIL);

if ($dataEmail):

    $photo = new Read;
    $photo->FullRead('SELECT user_photo FROM qr_users WHERE user_email = :emailUser', "emailUser={$dataEmail}");

    if (!$photo->getResult()):
        echo 'FALSE';
    elseif ($photo->getResult()[0]['user_photo'] === NULL):
        echo './asset/images/classprofile.png';
    else:
        echo $photo->getResult()[0]['user_photo'];
    endif;
else:
    echo './asset/images/classprofile.png';
endif;