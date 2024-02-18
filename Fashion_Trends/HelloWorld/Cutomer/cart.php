<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product_light_theme.css">
    <style>
    .info{
    width: 100%;
    right: 100%;
    text-align: right;
    font-weight: bolder ;
    }
    </style>
    <title>Product Management</title>
</head>
<body>
        <!-- Navigation Bar -->
    <nav>
    <?php 
    if(isset($_GET['cust_id'])){
        $cust_id = $_GET['cust_id'];  
        $seq = "SELECT * FROM customers WHERE cust_id = {$cust_id}";
        $res = mysqli_query($conn, $seq);
        $row = mysqli_fetch_assoc($res);
        echo "<a href='product.php?cust_id={$cust_id}'>Home</a>";
        // <!-- <a href="add_product.php">Add a New Product</a> -->
        echo "<a href='cart.php?cust_id={$cust_id}'>Cart</a>";
        echo "<a href='login.php'>Log out</a>";
        echo '<div class = "info">';
        echo " Hi, {$row['cust_name']}!";
        echo '</div>';
    }
    ?>
    </nav>
    <header>
        <h1>Cart</h1>
    </header>
   
    <div class="container">

        <?php
    // $id = $_GET['Product_id'];
    if(isset($_GET['cust_id'])){
        $cust_id = $_GET['cust_id'];
        $sel = "SELECT * FROM Product WHERE Product_id IN (SELECT Product_id FROM cart WHERE cust_id = {$cust_id})";
        $res = mysqli_query($conn, $sel);
        // <div class="text"></div>
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<div class="product-box">';
            // echo "<span>Product Id</span> : {$row["Product_id"]}  <br>";
            echo "<span>Product Name</span> : {$row["Product_Name"]}  <br>";
            echo "<span>Product Category</span> : {$row["Category"]}  <br>";
            echo "<span>Price</span> : {$row["Price"]}  <br><br>";
            // echo "<span>Stock</span> : {$row["Stock"]}  <br><br>";
            // echo "<a class='btn btn-success' href='update_specfic.php?Product_id={$row["Product_id"]}'>Update</a>";
            // echo "<a class='btn btn-danger' href='add_in_cart.php?Product_id={$row['Product_id']}'>Add</a>";
            $fpro = "SELECT * FROM cart WHERE Product_id = {$row['Product_id']}";
            $search = mysqli_query($conn,$fpro);
            $button = mysqli_fetch_assoc($search);
            if($button>=1){
                echo "<a class='btn btn-danger' href='delete_from_cart.php?Product_id={$row['Product_id']}&cust_id={$cust_id}'>Remove</a>";

            }
            else{
                echo "<a class='btn btn-success' href='add_in_cart.php?Product_id={$row['Product_id']}&cust_id={$cust_id}'>Add</a>";
            }

            echo '</div>'; // End of each product box
        }
    }
        
        ?>

    </div>
    <div class="contain">
    <?php
        $avg = "SELECT sum(price) as Avg_Price FROM Product WHERE Product_id IN (SELECT Product_id FROM cart WHERE cust_id = {$cust_id})";
        $res_avg = mysqli_query($conn, $avg);

        $row = mysqli_fetch_assoc(($res_avg));
        echo '<div class="avg-box">';
        echo '<div class="sub">';
        echo "Total Price: " . round($row["Avg_Price"]); echo '</div> ';
        echo '<div class="sub">';

        // echo "Avg Stock: " . round($row["Avg_Stock"]);echo '</div> ';
        // echo '<div class="sub">';

        // echo "Min Price: " . round($row["Min(Price)"]);echo '</div> ';
        // echo '<div class="sub">';

        // echo "Max Price: " . round($row["Max(Price)"]);echo '</div> ';
        // echo '<div class="sub">';

        // echo "Count Products: " . round($row["count(Product_id)"]) . "<br>";echo '</div> ';

        // echo '</div> '; // End of average box
        ?>

    </div>

</body>
</html>
