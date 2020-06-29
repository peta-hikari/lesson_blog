<?php

include '../model/memberData.php';
$memberdata = new MemberData;

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
//var_dump($input_datas);

include '../view/check_html.php';