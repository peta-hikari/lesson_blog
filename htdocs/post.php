<?php

include '../model/inputDB.php';
include '../model/categoryData.php';
$inputdb = new InputDB;
$categorydata = new CategoryData;

$categories = [];

$res = $inputdb->getCategories();
$categorydata->setCategories($res);
$categories = $categorydata->getCategories();
$category_items = $categorydata->getItems();

include '../view/post_html.php';