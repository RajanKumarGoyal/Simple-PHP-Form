<?php

$server="localhost";
$username="tpss";
$password="1";
$database = "core_php";

global $connect;
$connect = new mysqli($servername,$username,$password,$database);

if($connect->connect_error)
    echo "Connection error:" .$connect->connect_error;