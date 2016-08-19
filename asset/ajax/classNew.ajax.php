<?php

require_once '../../_app/Config.inc.php';

$newClassData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$newClass = new Create;
$newClass->ExeCreate('qr_class', $newClassData);

$readQuestion = new Read;
$readQuestion->FullRead("SELECT question_id FROM qr_question ORDER BY RAND() LIMIT {$newClassData['class_amounts']}");

foreach ($readQuestion->getResult() as $Question):
    $newsQuestion['classQuestion_IdClass'] = $newClass->getResult();
    $newsQuestion['classQuestion_IdQuestion'] = $Question['question_id'];
    $newsQuestion['classQuestion_status'] = 0;

    $newClassQuestion = new Create;
    $newClassQuestion->ExeCreate('qr_class_question', $newsQuestion);

endforeach;
echo $newClass->getResult();
