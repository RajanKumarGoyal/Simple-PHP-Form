<?php

include './queries.php';

$object = new Query();
$response = $object->index();

// echo "<pre>";print_r($response);die;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer Listing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css"/>
    </head>
    <body>
        <div class="container">
            <h2>Customer Listing</h2>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-info">
                    <strong>Info!</strong> <?php echo $_SESSION['message'];unset($_SESSION['message']); ?>
                </div>
            <?php endif?>
         <div class="row">
            <div class="col-sm-12 d-flex justify-content-end mb-3">
                <a href="/tpsspl-1/core/form.php" class="btn btn-info">Add</a>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="userTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Invoice</th>
                    <th>Amount</th>
                    <th>Margin</th>
                    <th>Total</th>
                    <th>MOP</th>
                    <th>Created Date</th>
                    <th>Action(s)</th>
                </tr>
            </thead>
            <tbody>

            <?php if (!empty($response['data'])) { ?>
                <?php foreach ($response['data'] as $key => $user) { ?>
                    <tr>
                        <td><?php echo ++$key; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td><?php echo $user['invoiceNumber']; ?></td>
                        <td><?php echo $user['amount']; ?></td>
                        <td><?php echo $user['margin']; ?></td>
                        <td><?php echo $user['total']; ?></td>
                        <td><?php echo $user['modPayment']; ?></td>
                        <td><?php echo date_format(date_create($user['created_at']), "Y/m/d"); ?></td>
                        <td>
                            <a href="<?php echo 'form.php?edit=' . $user['id']; ?>" class="btn btn-sm btn-primary mr-1 mb-1">Edit</a>
                            <a href="<?php echo 'form.php?del=' . $user['id']; ?>" class="btn btn-sm btn-danger mb-1">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>

            </tbody>
        </table>
        </div>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script type="text/javascript" src="//cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="//cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                "processing": true,
                "paging": true,
            });
        });
    </script>
</html>
