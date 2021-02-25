<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
            $response['message'] = "ERROR occured!";
            $response['data'] = array();
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
        $particulars = $data['particulars'];

        $margin = $data['margin'];
        $gstNumber = $data['gstNumber'];
        $total = $amount + $margin + ($margin * (18/100));

        $sql = "INSERT INTO customers (name, email, phone, address, particulars, amount, modPayment, invoiceNumber, margin, gstNumber, total ) VALUES ('$cName', '$email', '$phone', '$address', '$particulars', '$amount','$modPayment', '$invoice', '$margin', '$gstNumber', '$total')";

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
    
    function update($data) {

        $id = $data['id'];
        $cName = $data['cName'];
        $email = $data['email'];
        $address = $data['address'];
        $phone = $data['phone'];
        $amount = $data['amount'];
        $modPayment = $data['modPayment'];
        $particulars = $data['particulars'];
    
        $margin = $data['margin'];
        $gstNumber = $data['gstNumber'];
        $total = $amount + $margin + ($margin * (18/100));

        $sql = "UPDATE customers SET name='$cName', email='$email', address='$address', particulars='$particulars', phone='$phone', amount='$amount', modPayment='$modPayment', margin='$margin', gstNumber='$gstNumber', total='$total' WHERE id=$id";
    
        $response = array();
        if(mysqli_query($GLOBALS['connect'], $sql)){

            $response['status'] = 200;
            $response['message'] = 'Records updated successfully.';

        } else{

            $response['status'] = 500;
            $response['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($GLOBALS['connect']);
        }

        return $response;
    }
}


if(isset($_POST['submit'])) 
{
    $object = new Query();
    $response = $object->create($_POST);

    $_SESSION['message'] = $response['message']; 
    header('location: index.php');
}

if (isset($_POST['update'])) {

    $object = new Query();
    $response = $object->update($_POST);

	$_SESSION['message'] = $response['message']; 
    // header('location: form.php?edit='.$_POST['id']);
    header('location: index.php');
}