<?php

include '../model/loginData.php';
include '../model/checkErrors.php';
include '../model/inputDB.php';
include '../model/ctrlSession.php';
$logindata = new LoginData;
$checkerrors = new CheckErrors;
$inputdb     = new InputDB;
$ctrlsession = new CtrlSession;

session_start();

$errors = [];

$login_items = $logindata->getItems();
foreach($login_items as $key){
    if(isset($_POST[$key])){
        $logindata->setData($_POST[$key], $key);
    }
}
$login_datas = $logindata->getData();

if(empty($_SESSION['mail'])){
    $ctrlsession->startSession($login_datas);
} else {
    include '../view/top_html.php';
    exit();
}

if(! $checkerrors->checkDataerrors($login_datas)) {
    $errors = $checkerrors->getErrors();
    include '../view/index_html.php';
    exit();
}

if(!$inputdb->searchUser($login_datas)){
    $errors['mail'] = 'メールアドレス又はパスワードが間違っています。';
    include '../view/index_html.php';
    exit();
}

include '../view/top_html.php';