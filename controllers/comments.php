<?php 
//complete code for controllers/comments.php

//include class definition
include_once "models/Comment_Table.class.php";

//create a new object, pass it a PDO database connection object
$commentTable = new Comment_Table($db);

$newCommentSubmitted = isset($_POST['new-comment']);
if($newCommentSubmitted){
	$whichEntry = $_POST['entry-id'];
	$user = $_POST['user-name'];
	$comment = $_POST['new-comment'];
	$commentTable->saveComment($whichEntry,$user,$comment);
}

$comments = include_once "views/comment-form-html.php";


//Test saving a Comment
//$commentTable->saveComment(22, "Greg", "test");
//Test geting a Comment
//echo($entryId);
//$allComments = $commentTable->getAllById($entryId);
//get first row as a StdClass object
//$firstComment = $allComments->fetchObject();
//$testOutput = print_r($firstComment,true);
//die("<pre>$testOutput</pre>");

$allComments = $commentTable->getAllById($entryId);
//notice the incremental concatentation operator .=
$comments .= include_once "views/comments-html.php";

return $comments;

?>