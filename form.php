<?php 

require_once('./connection.php');

if (isset($_GET['edit'])) {

    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($GLOBALS['connect'], "SELECT * FROM customers WHERE id=$id");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);

        $cName = $n['name'];
        $email = $n['email'];
        $phone = $n['phone'];
        $amount = $n['amount'];
        $address = $n['address'];
        $modPayment = $n['modPayment'];
    }
}

if (isset($_GET['del'])) {
	
    $id = $_GET['del'];
	mysqli_query($GLOBALS['connect'], "DELETE FROM customers WHERE id=$id");

	$_SESSION['message'] = "Customer deleted!"; 
	header('location: index.php');
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
    <form action="queries.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label for="cName">Customer Name:</label>
            <input type="text" class="form-control" placeholder="Enter Customer Name" name="cName" value="<?php echo $cName; ?>">
        </div>
        <div class="form-group">
            <label for="cName">Customer Email:</label>
            <input type="email" class="form-control" placeholder="Enter Customer Email" name="email" value="<?php echo $email; ?>">
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone" value="<?php echo $phone; ?>">
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" class="form-control" placeholder="Enter Address">
                <?php echo strip_tags($address); ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" placeholder="Enter Amount" name="amount" value="<?php echo $amount; ?>">
        </div>
        <div class="form-group">
            <label for="modPayment">Mode of Payment:</label>
            <select name="modPayment" class="form-control">
                <option value="online" <?php echo ($modPayment == 'online') ? 'selected' : '' ?>>Online</option>
                <option value="cash" <?php echo ($modPayment == 'cash') ? 'selected' : '' ?>>Cash</option>
            </select>
        </div>

        <?php if ($update == true): ?>
            <input type="submit" class="btn btn-default" name="update" value="Update">
        <?php else: ?>
            <input type="submit" class="btn btn-default" name="submit" value="Save">
        <?php endif ?>

    </form>
    </div>
</body>
</html>
