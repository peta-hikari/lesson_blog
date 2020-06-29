<?php
include '../model/checkErrors.php';
include '../model/memberData.php';
include '../model/inputDB.php';
$checkerrors = new CheckErrors;
$memberdata     = new MemberData;
$inputdb     = new InputDB;
$input_datas = [];
$errors = [];

$input_items = $memberdata->getItems();

   foreach($input_items as $key){
        $memberdata->setData($_POST[$key], $key);
    }
    $input_datas = $memberdata->getData();

    if(!$checkerrors->checkDataerrors($input_datas)) {
        $errors = $checkerrors->getErrors();
        include '../view/index_html.php';
        exit();
    }

    $inputdb->saveDbPostData($input_datas);

include '../view/complete_html.php';