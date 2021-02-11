 <?php

include('./queries.php');

$object = new Query();
$object->create($_POST);
 
?>