<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="product.css">
    <title>Product Management</title>
</head>
<body>
        <!-- Navigation Bar -->
    <nav>
        <a href="product.php">Home</a>
        <a href="add_product.php">Add a New Product</a>
        <a href="update_product.php">Update Any Product</a>
        <a href="login.php">Log out</a>

        <!-- Add more links as needed -->
    </nav>
    <header>
        <h1>Product Management</h1>
    </header>
    <div class="contain">
        <?php
        $avg = "SELECT avg(price) as Avg_Price, avg(Stock) as Avg_Stock, count(Product_id), Max(Price), Min(Price) FROM Product";
        $res_avg = mysqli_query($conn, $avg);

        $row = mysqli_fetch_assoc(($res_avg));
        echo '<div class="avg-box">';
        echo '<div class="sub">';
        echo "Avg Price: " . round($row["Avg_Price"]); echo '</div> ';
        echo '<div class="sub">';

        echo "Avg Stock: " . round($row["Avg_Stock"]);echo '</div> ';
        echo '<div class="sub">';

        echo "Min Price: " . round($row["Min(Price)"]);echo '</div> ';
        echo '<div class="sub">';

        echo "Max Price: " . round($row["Max(Price)"]);echo '</div> ';
        echo '<div class="sub">';

        echo "Count Products: " . round($row["count(Product_id)"]) . "<br>";echo '</div> ';

        echo '</div> '; // End of average box
        ?>

    </div>
    <div class="container">

        <?php

        $sel = "SELECT * FROM Product";
        $res = mysqli_query($conn, $sel);
        // <div class="text"></div>
        while ($row = mysqli_fetch_assoc($res)) {
            echo '<div class="product-box">';
            echo "<span>Product Id</span> : {$row["Product_id"]}  <br>";
            echo "<span>Product Name</span> : {$row["Product_Name"]}  <br>";
            echo "<span>Product Category</span> : {$row["Category"]}  <br>";
            echo "<span>Product Bodytype</span> : {$row["Bodytype"]}  <br>";
            echo "<span>Price</span> : {$row["Price"]}  <br>";
            echo "<span>Stock</span> : {$row["Stock"]}  <br><br>";
            echo "<a class='btn btn-success' href='update_specfic.php?Product_id={$row["Product_id"]}'>Update</a>";
            echo "<a class='btn btn-danger' href='delete_product.php?Product_id={$row['Product_id']}'>Delete</a>";
            echo '</div>'; // End of each product box
        }

        
        ?>

    </div>

</body>
</html>
