<?php 
//copmlete code for controllers/search.php

//load model
include_once "models/Blog_Entry_Table.class.php";
$blogTable = new Blog_Entry_Table($db);

$searchOutput = "";
if(isset($_POST['search-term'])){
	$searchTerm = $_POST['search-term'];
	$searchData = $blogTable->searchEntry($searchTerm);
	$searchOutput = include_once "views/search-results-html.php";	
}

//get PDOStatement object from model
//$searchData = $blogTable->searchEntry("update");
//get first row from result set
//$firstResult = $searchData->fetchObject();
//inspect first row
//$searchOutput = print_r($firstResult,true);
//$searchForm = include_once "views/search-form-html.php";
//$searchOutput .= $searchForm;
//dipslay all output on index.php
return $searchOutput;

//return "You just searched for something";
?>