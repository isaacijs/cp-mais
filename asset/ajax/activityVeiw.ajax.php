<?php

ob_start();
session_start();

$Question = $_SESSION['Question'];
$key = filter_input(INPUT_POST, 'key', FILTER_DEFAULT);

if ($Question):
    echo json_encode($Question[$key]);
endif;