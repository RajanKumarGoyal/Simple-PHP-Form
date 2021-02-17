<?php

include('./queries.php');

$object = new Query();
$response = $object->index();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Customer Listing</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h2>Customer Listing</h2>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-info">
                    <strong>Info!</strong> <?php echo $_SESSION['message'];unset($_SESSION['message']); ?>
                </div>
            <?php endif ?>

        <a href="/tpsspl-1/core/form.php" class="btn btn-info" style="margin-bottom: 8px;float: right;">Add</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Invoice</th>
                    <th>Mode of Payment</th>
                    <th>Created Date</th>
                    <th>Action(s)</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $string = '';
                    foreach ($response['data'] as $key => $value) {

                        $string .= '<tr>';
                            $string .= '<td>';
                                $string .= ++$key;
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= $value[1];
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= $value[2];
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= $value[3];
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= $value[7];
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= $value[5];
                            $string .= '</td>';
                            $string .= '<td>';
                                $date = date_create($value[8]);
                                $string .= date_format($date, "Y/m/d H:i:s");
                            $string .= '</td>';
                            $string .= '<td>';
                                $string .= '<a href="form.php?edit='. $value[0] .'" class="btn btn-primary">Edit</a>&nbsp;&nbsp;';
                                $string .= '<a href="form.php?del='. $value[0] .'" class="btn btn-danger">Delete</a>';
                            $string .= '</td>';
                        $string .= '</tr>';
                    }

                    echo $string;
                ?>
            </tbody>
        </table>
        </div>
    </body>
</html>
