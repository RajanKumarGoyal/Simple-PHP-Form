<?php

require_once('./connection.php');

$sql = mysqli_query($GLOBALS['connect'], "SELECT * FROM `customers`");

$totalRecords = mysqli_num_rows($sql);
$records = $sql->fetch_all(MYSQLI_ASSOC);

$json_data = array(
    "draw"            => 1,   
    "recordsTotal"    => intval($totalRecords),  
    "recordsFiltered" => intval($totalRecords),
    "data"            => $records
);

echo json_encode($json_data);

?>