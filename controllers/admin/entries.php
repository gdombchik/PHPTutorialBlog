<?php 
//complete source code for controllers/admin/entries.php
include_once 'models/Blog_Entry_Table.class.php';
$entryTable = new Blog_Entry_Table($db);
//get a PDOStatement object to get access to all entries
$allEntries = $entryTable->getAllEntries();
//test that you can get the first row as a StdClass object
//$oneEntry = $allEntries->fetchObject();
//prepare test output
//$testOutPut = print_r($oneEntry,true);
//return test output to front controller, to admin.php
//return "<pre>$testOutPut</pre>"
return include_once 'views/admin/entries-html.php';
?>