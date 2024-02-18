<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title> Order Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Details Add
                            <a href="index.php" class="btn btn-danger float-right">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="productname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Delivery ID</label>
                                <input type="text" name="deliveryid" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Estimated Date Of Delivery</label>
                                <input type="date" name="eod" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Stock Left</label>
                                <input type="number" name="stock" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_details" class="btn btn-primary">Save Details</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
