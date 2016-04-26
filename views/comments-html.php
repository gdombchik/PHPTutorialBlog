<?php 
//complete code for views/comments-html.php

$commentsFound = isset($allComments);
if($commentsFound === false){
	trigger_error('views/comments-html.php needs $allComments');
}

$allCommentsHTML = "<ul id='comments'>";
//iterate through all rows returned from database

//echo($allComments->rowCount());

if($allComments->rowCount()>0){
	while ($commentData = $allComments->fetchObject()){
		//notice incremental concatenation operator .=
		//it adds <li> elements to the <ul>
		$allCommentsHTML .= "<li>
		$commentData->author wrote: <p>$commentData->txt</p>
		</li>
		";
	}	
}else{
	$allCommentsHTML .= "<li>Be the first to comment this article</li>";
}

//notice incremental concatentation operator .=
//it helps close the <ul> element
$allCommentsHTML .= "</ul>";
return $allCommentsHTML;

?>