<?php

include('./queries.php');

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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <h2>Customer Listing</h2>

            <?php if (isset($_SESSION['message'])): ?>
                <div class="alert alert-info">
                    <strong>Info!</strong> <?php echo $_SESSION['message'];unset($_SESSION['message']); ?>
                </div>
            <?php endif ?>
         <div class="row">       
            <div class="col-sm-12 d-flex justify-content-end mb-3">
                <a href="/tpsspl-1/core/form.php" class="btn btn-info">Add</a>
            </div>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered">
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
                <?php 
                    $string = '';

                    if (empty($response['data'])) {

                        $string .= '<tr>';
                            $string .= '<td colspan="11" class="text-center"><h2>No Customer Found!</h2></td>';
                        $string .= '</tr>';                            

                    } else {

                        foreach ($response['data'] as $key => $value) {

                            // echo "<pre>";print_r($value);die;   
    
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
                                    $string .= $value[8]; // Invoice
                                $string .= '</td>';
                                $string .= '<td>';
                                    $string .= $value[7]; // Amount
                                $string .= '</td>';
                                $string .= '<td>';
                                    $string .= $value[11]; // Margin
                                $string .= '</td>';
                                $string .= '<td>';
                                    $string .= $value[10]; // total
                                $string .= '</td>';
                                $string .= '<td>';
                                    $string .= ucwords($value[6]);
                                $string .= '</td>';
                                $string .= '<td>';
                                    $date = date_create($value[12]);
                                    $string .= date_format($date, "Y/m/d");
                                $string .= '</td>';
                                $string .= '<td>';
                                    $string .= '<a href="form.php?edit='. $value[0] .'" class="btn btn-sm btn-primary mr-1 mb-1">Edit</a>';
                                    $string .= '<a href="form.php?del='. $value[0] .'" class="btn btn-sm btn-danger mb-1">Delete</a>';
                                $string .= '</td>';
                            $string .= '</tr>';
                        }

                    }

                    echo $string;
                ?>
            </tbody>
        </table>
        </div>
        </div>
    </body>
</html>
