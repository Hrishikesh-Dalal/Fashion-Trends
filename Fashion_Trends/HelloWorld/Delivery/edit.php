<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title> Order Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Details Edit
                            <a href="index.php" class="btn btn-danger float-right">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php 
                        
                         if(isset($_GET['id']))
                         {
                             $delivery_id = mysqli_real_escape_string($con, $_GET['id']);
                             $query = "SELECT * FROM deliver WHERE id='$delivery_id' ";
                             $query_run = mysqli_query($con, $query);
 
                             if(mysqli_num_rows($query_run) > 0)
                             {
                                 $deliveries = mysqli_fetch_array($query_run);
                                 ?>
                        <form action="code.php" method="POST">
                        <input type="hidden" name="delivery_id" value="<?= $deliveries['id']; ?>">

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="productname" value="<?=$deliveries['productname'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Delivery ID</label>
                                <input type="text" name="deliveryid" value="<?=$deliveries['deliveryid'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Estimated Date Of Delivery</label>
                                <input type="date" name="eod" value="<?=$deliveries['eod'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stock Left</label>
                                <input type="number" name="stock" value="<?=$deliveries['stock'];?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_details" class="btn btn-primary">Update Details</button>
                            </div>

                        </form>
                        <?php
                    }
                    else
                    {
                        echo "<h4>No Such Id Found</h4>";
                    }
                }
                ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
