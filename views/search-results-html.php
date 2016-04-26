<?php

$searchDataFound = isset( $searchData );
if( $searchDataFound === false ){
    trigger_error('views/search-results-html.php needs $searchData');
}

if($searchData->rowCount()>0){
	$searchHTML = "<section id='search'> <p>
	You searched for <em>$searchTerm</em></p><ul>";
	while ( $searchRow = $searchData->fetchObject() ){
		$href = "index.php?page=blog&amp;id=$searchRow->entry_id";
		$searchHTML .= "<li><a href='$href'>$searchRow->title</li>";
	}
}else{
	$searchHTML = "<section id='search'> <p>
	<em>No entries match your search</em></p><ul>";
}

$searchHTML .= "</ul></section>";

return $searchHTML;

?>