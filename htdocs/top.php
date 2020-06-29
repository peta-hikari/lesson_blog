<?php

include '../model/loginData.php';
include '../model/checkErrors.php';
include '../model/inputDB.php';
$logindata = new LoginData;
$checkerrors = new CheckErrors;
$inputdb     = new InputDB;

$errors = [];

$login_items = $logindata->getItems();
foreach($login_items as $key){
    $logindata->setData($_POST[$key], $key);
}
$login_datas = $logindata->getData();
var_dump($login_datas);

if(! $checkerrors->checkDataerrors($login_datas)) {
    $errors = $checkerrors->getErrors();
    include '../view/index_html.php';
    exit();
}

if(!$inputdb->searchUser($login_datas)){
    include '../view/index_html.php';
    exit();
}

include '../view/top_html.php';