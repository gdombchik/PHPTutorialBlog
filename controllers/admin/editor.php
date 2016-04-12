<?php 
//complete source code for controllers/admin/editor.php

//include class defintion and creat an object
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);

//was editor form submitted?
$editorSubmitted = isset($_POST['action']);
if($editorSubmitted){
	$buttonClicked = $_POST['action'];
	
	$id = $_POST['id'];
	
	//was "save" button clicked
	$save = ($buttonClicked === 'save');
	
	//insert, update, or delete
	$insertNewEntry = ($save and $id === '0');
	$deleteEntry = ($buttonClicked === 'delete');
	$updateEntry = ($save and $insertNewEntry === false);
	
	if($insertNewEntry){
		//get titel and entry data from editor form
		$title = $_POST['title'];
		$entry = $_POST['entry'];
		//save the new entry
		$savedEntryId = $entryTable->saveEntry($title,$entry);
	}else if ($updateEntry){
		$title = $_POST['title'];
		$entry = $_POST['entry'];
		$entryTable->updateEntry($id,$title,$entry);
		$savedEntryId = $id;
	}else if ($deleteEntry){
		//get the entry id from the hidden input in editor form
		$entryTable->deleteEntry($id);
		//$entryData->entry_id = $id;
	}
}

$entryRequest = isset($_GET['id']);
if($entryRequest){
	$id = $_GET['id'];
	$entryData = $entryTable->getEntry($id);
	$entryData->entry_id=$id;
	$entryData->message = "";
	$entryData->legend = "Edit Entry";
}

//entry was saved or updated;
$entrySaved = isset($savedEntryId);
if($entrySaved){
	$entryData = $entryTable->getEntry($savedEntryId);
	//display a confirmation message
	$entryData->message = "Entry was saved";
	$entryData->legend = "Edit Entry";
}

$editorOutput = include_once 'views/admin/editor-html.php';
return $editorOutput;

?>