<?php 
//complete code for controllers/blog.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);

$isEntryClicked = isset($_GET['id']);
if($isEntryClicked){
	//show one entry...soon
	$entryId = $_GET['id'];
	//$blogOutput = "will son show entry with entry_id = $entryId";
	$entryData = $entryTable->getEntry($entryId);
	$blogOutput = include_once 'views/entry-html.php';
	//$test = print_r($entryData,true);
	
	//return the printed object to index to see if in browser
	//return "<pre>$test</pre>";
	
	$blogOutput .=include_once "controllers/comments.php";
	
}else{
	//$entries is the PDOStatement returns from getAllEntries
	$entries = $entryTable->getAllEntries();
	//fetch data from the first row as a StdClass object
	//$oneEntry = $entries->fetchObject();
	//$test = print_r($oneEntry,true);
	
	//return the printed object to index to see if in browser
	//return "<pre>$test</pre>";
	//load the view
	$blogOutput = include_once 'views/list-entries-html.php';
}
return $blogOutput;

?>