<?php
include '../model/loginData.php';
include '../model/ctrlSession.php';

$logindata = new LoginData;
$ctrlsession = new CtrlSession;

if(!empty($_POST['logout'])){
    $ctrlsession->endSession();
}

$login_items = $logindata->getItems();
$login_datas = $logindata->getData();




include '../view/index_html.php';