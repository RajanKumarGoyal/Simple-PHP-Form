<?php

require_once('./connection.php');

class Query {
    
    function index() {
     
        $sql = mysqli_query($GLOBALS['connect'], "SELECT * FROM `customers`");
        $records = $sql->fetch_all();

        $response = array();
        if(count($records)){

            $response['status'] = 200;
            $response['message'] = 'Records inserted successfully.';
            $response['data'] = $records;

        } else{
            
            $response['status'] = 500;
            $response['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($GLOBALS['connect']);
        }

        return $response;

    }

    function create($data) {

        $cName = $data['cName']; 
        $email = $data['email']; 
        $phone = $data['phone']; 
        $address = $data['address']; 
        $amount = $data['amount']; 
        $modPayment = $data['modPayment']; 
        $invoice = rand(10, 1000000);

        $sql = "INSERT INTO customers (name, email, phone, address, amount, modPayment, invoiceNumber ) VALUES ('$cName', '$email', '$phone', '$address','$amount','$modPayment', '$invoice')";

        $response = array();
        if(mysqli_query($GLOBALS['connect'], $sql)){
            $response['status'] = 200;
            $response['message'] = 'Records inserted successfully.';
        } else{
            $response['status'] = 500;
            $response['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($GLOBALS['connect']);
        }

        return $response;
    }
    
}