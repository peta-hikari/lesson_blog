<?php

include '../model/memberData.php';
include '../model/checkErrors.php';
include '../model/regi_conf.php';
$memberdata = new MemberData;
$checkerrors = new CheckErrors;
$regiconf = new RegiConf;

$errors = [];
$years  = $regiconf->getYears();
$months = $regiconf->getMonths();
$days   = $regiconf->getDays();

$input_items = $memberdata->getItems();
foreach($input_items as $value){
    if($value == 'birth'){
        $birth = $memberdata->getBirth($_POST['year'], $_POST['month'], $_POST['day']);
        $memberdata->setData($birth, 'birth');
    } else{
        $memberdata->setData($_POST[$value], $value);
    }
}
$input_datas = $memberdata->getData();

if(! $checkerrors->checkDataerrors($input_datas)) {
    $errors = $checkerrors->getErrors();
    include '../view/regi_html.php';
    exit();
}

include '../view/check_html.php';