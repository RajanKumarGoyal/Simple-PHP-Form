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
        $particulars = $n['particulars'];
        $modPayment = $n['modPayment'];

        $margin = $n['margin'];
        $gstNumber = $n['gstNumber'];

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">

    <?php if ($update == true): ?>
        <h2>Edit (Customer) Form</h2>
    <?php else: ?>
        <h2>Submit (Customer) Form</h2>
    <?php endif ?>

    <form action="queries.php" method="post">

        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="form-group">
            <label for="cName">Customer Name:</label>
            <input type="text" class="form-control" placeholder="Enter Customer Name" name="cName" value="<?php echo $cName; ?>" required>
        </div>
        <div class="form-group">
            <label for="cName">Customer Email:</label>
            <input type="email" class="form-control" placeholder="Enter Customer Email" name="email" value="<?php echo $email; ?>" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="number" class="form-control" placeholder="Enter Phone Number" name="phone" value="<?php echo $phone; ?>" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <textarea name="address" rows="4" cols="50" class="form-control" placeholder="Enter Address">
                <?php echo strip_tags($address); ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="address">Particulars:</label>
            <textarea name="particulars" rows="4" cols="50" class="form-control" placeholder="Enter Particulars">
                <?php echo strip_tags($particulars); ?>
            </textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" class="form-control" placeholder="Enter Amount" name="amount" value="<?php echo $amount; ?>" required>
        </div>
        <div class="form-group">
            <label for="amount">Margin:</label>
            <input type="number" class="form-control" placeholder="Enter Margin" name="margin" value="<?php echo $margin; ?>" required>
        </div>
        <div class="form-group">
            <label for="amount">GST Number:</label>
            <input type="text" class="form-control" placeholder="Enter GST Number" name="gstNumber" value="<?php echo $gstNumber; ?>">
        </div>
        <div class="form-group">
            <label for="modPayment">Mode of Payment:</label>
            <select name="modPayment" class="form-control">
                <option value="online" <?php echo ($modPayment == 'online') ? 'selected' : '' ?>>Online</option>
                <option value="cash" <?php echo ($modPayment == 'cash') ? 'selected' : '' ?>>Cash</option>
            </select>
        </div>

        <?php if ($update == true): ?>
            <input type="submit" class="btn btn-primary" name="update" value="Update">
        <?php else: ?>
            <input type="submit" class="btn btn-info" name="submit" value="Save">
        <?php endif ?>

        <a href="/tpsspl-1/core/index.php" class="btn btn-default">Back</a>            

    </form>
    </div>
</body>
</html>
