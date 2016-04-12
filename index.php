<?php 
//complete code for index.php
error_reporting(E_ALL);
ini_set("display_errors",1);
include_once 'models/Page_Data.class.php';
$pageData = new Page_Data();
$pageData->title = "PHP/MySQL blog demo example";
$pageData->addCSS("css/blog.css");

$dbInfo = "mysql:host=localhost:3306;dbname=simple_blog";
$dbUser = "root";
$dbPassword = "password";
$db = new PDO($dbInfo,$dbUser,$dbPassword);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//$pageData->content .= "<h1>All is good</h1>";
$pageData->content .= include_once 'controllers/blog.php';
$page = include_once 'views/page.php';
echo $page;
?>