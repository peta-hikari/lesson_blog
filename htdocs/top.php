<?php

include '../model/loginData.php';
include '../model/checkErrors.php';
include '../model/inputDB.php';
include '../model/ctrlSession.php';
include '../model/viewPosts.php';
$logindata   = new LoginData;
$checkerrors = new CheckErrors;
$inputdb     = new InputDB;
$ctrlsession = new CtrlSession;
$viewposts   = new ViewPosts;

session_start();

$errors = [];
$view_posts = [];

if(empty($_SESSION['mail'])){
    $login_items = $logindata->getItems();
    foreach($login_items as $key){
        if(isset($_POST[$key])){
            $logindata->setData($_POST[$key], $key);
        }
    }
    $login_datas = $logindata->getData();
    $ctrlsession->startSession($login_datas);

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
}

$timeline = $inputdb->getPosts();
foreach($timeline as $key => $row){
    $view_posts[$key] = $viewposts->setViewdatas($row);
}


include '../view/top_html.php';