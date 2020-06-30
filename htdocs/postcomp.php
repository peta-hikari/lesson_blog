<?php
include '../model/checkErrors.php';
include '../model/inputDB.php';
include '../model/postData.php';
include '../model/categoryData.php';
$checkerrors = new CheckErrors;
$inputdb = new InputDB;
$postdata = new PostData;
$categorydata = new CategoryData;
session_start();
$errors = [];
$categories = [];

$res = $inputdb->getCategories();
$categorydata->setCategories($res);
$categories = $categorydata->getCategories();
$category_items = $categorydata->getItems();

$post_items = $postdata->getItems();
foreach($post_items as $value){
    $postdata->setPost($_POST[$value], $value);
}
$input_posts = $postdata->getPost();

if(! $checkerrors->checkDataerrors($input_posts)) {
    $errors = $checkerrors->getErrors();
    include '../view/post_html.php';
    exit();
}

$inputdb->inputPosts($input_posts);


include '../view/postcomp_html.php';