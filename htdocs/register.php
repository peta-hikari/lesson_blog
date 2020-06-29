<?php
include '../model/regi_conf.php';
include '../model/memberData.php';
$regiconf = new RegiConf;
$memberdata = new MemberData;

$years  = $regiconf->getYears();
$months = $regiconf->getMonths();
$days   = $regiconf->getDays();

$input_datas = $memberdata->getData();


include '../view/regi_html.php';