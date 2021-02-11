<?php 

include('./queries.php');

if(isset($_POST['submit'])) 
{
    $object = new Query();
    $response = $object->create($_POST);

    echo "<pre>";print_r($response);die;
}

?>

<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
    <h2>Submit (Customer) Form</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="cName">Customer Name:</label>
            <input type="text" class="form-control" placeholder="Enter Customer Name" name="cName">
        </div>
        <div class="form-group">
            <label for="cName">Customer Email:</label>
            <input type="email" class="form-control" placeholder="Enter Customer Email" name="email">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" class="form-control" placeholder="Enter Address"></textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" placeholder="Enter Amount" name="amount">
        </div>
        <div class="form-group">
            <label for="modPayment">Mode of Payment:</label>
            <select name="modPayment" class="form-control">
                <option value="online">Online</option>
                <option value="cash">Cash</option>
            </select>
        </div>
        <input type="submit" class="btn btn-default" name="submit" value="Submit">
    </form>
    </div>
</body>
</html>
