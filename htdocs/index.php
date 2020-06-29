<?php
include '../model/loginData.php';
$logindata = new LoginData;

$login_items = $logindata->getItems();
/*foreach($login_items as $key){
    $logindata->setData($_POST[$key], $key);
}*/
$login_datas = $logindata->getData();




include '../view/index_html.php';