<?php
    echo "Hello World! How are you<br>";
    $name = "hrishikesh";
    echo "Hi {$name}!";

    $int1 = 21;
    $int2 = 3;
    $mul = $int1 * $int2;

    echo "<br>{$int1} x {$int2} = \${$mul}";

    //arrays
    $food = array("hat", "bat");
    echo $food[1];
    array_push($food, "cat", "rat");
    array_pop($food, );
    array_shift($food,);


    //assosiative arrays is like a hash function key=>val
    $price = array("Hat" => 120,
                    "Bat" => 130,
                    "cat" => 150
    );
    $keys = array_keys($price);
    foreach($price as $pr => $cost){
        echo "{$pr} => {$cost}";
    }
    echo "<br>";
    foreach($keys as $key){
        echo "{$key}";
    }

    //get /post
    //get less secure while post is more secure


    //isset return true if the var is deifned
    //empty if the var is not defined
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label for="username">Number</label>
        <input type="text" name="counter">
        <input type="submit" value="start">
    </form>

    <form action="index.php" method="post">
        <input type="checkbox" name="Low Value" value="low" >Low<br>
        <input type="checkbox" name="Med Value" value="med" >Med<br>
        <input type="checkbox" name="High Value" value="high" >High<br>
        <input type="submit" value="Enter">
    </form>
</body>
</html>

<?php
    if(isset($_POST["submit"])){
        foreach($_POST["checkbox"] as $key){
            echo $key;
            // echo $val;
        }
    }
    // $counter = $_POST["counter"];
    // $i = 1;
    // while($i<= $counter){
    //     echo "{$i}<br>";
    //     $i++;
    // }
?>


<?php
    include("database.php");
    $quer = "INSERT INTO PRODUCT VALUES (15,'Boot', 'App', 230,50)";
    // mysqli_query($conn, $quer);

    // //selection table
    // $sel = "SELECT * FROM Product";
    // $res = mysqli_query($conn, $sel);

    // while($row = mysqli_fetch_assoc(($res)))
    //     echo "<b>Product Id</b> : {$row["Product_id"]}  <br>
    //     Product Name : {$row["Product_Name"]}  <br>
    //     Product Category : {$row["Category"]}  <br>
    //     Price : {$row["Price"]}  <br>
    //     Stock : {$row["Stock"]}  <br>    
    //     <br> <br> <br>";

    $sel = "SELECT * FROM Product";
    $res = mysqli_query($conn, $sel);
    
    echo '<div style="display: flex; flex-wrap: wrap; gap: 20px;">'; // Start of the container with flex display
    
    while ($row = mysqli_fetch_assoc($res)) {
        echo '<div style="border: 1px solid #ccc; border-radius: 10px; padding: 15px; width: 20%; background-color: #ffbb8a;">'; // Styling for each box with background color
        echo "<b>Product Id</b>: {$row["Product_id"]}  <br>";
        echo "Product Name: {$row["Product_Name"]}  <br>";
        echo "Product Category: {$row["Category"]}  <br>";
        echo "Price: {$row["Price"]}  <br>";
        echo "Stock: {$row["Stock"]}  <br>";
        echo "<a class='btn btn-success' href='edit.php?Product_id=$row[Product_id]'>Edit</a>";
        echo "<a class='btn btn-danger' href='delete_product.php?Product_id=" . $row['Product_id'] . "'>Delete</a>";

        echo '</div>'; // End of each box
    }
    
    echo '</div>'; // End of the container
    

    //to display the avergae price
    $avg = "SELECT avg(price) as Avg_Price, avg(Stock) as Avg_Stock FROM Product";
    $res_avg = mysqli_query($conn, $avg);
    // echo $res_avg;

    $row = mysqli_fetch_assoc(($res_avg));
    echo "Avg Price " . round($row["Avg_Price"]) . "<br>";
    echo "Avg Stock " . round($row["Avg_Stock"]);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Del Prod</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label>Product Id</label><br>
        <input type="number" name="Product_id" placeholder="eg. 1, 2,.."><br>

        <label>Product Name</label><br>
        <input type="text" name="Product_Name" placeholder="eg. Leather Jacket"><br>

        <input type="submit" name="Delete" value="Delete">

    </form>

</body>
</html>
<?php
    //to insert a product
    // if($_POST['enter']){
    //     $prod_id = $_POST["Product_id"];
    //     $prod_name = $_POST["Product_Name"];
    //     $prod_cat = $_POST["category"];
    //     $prod_price = $_POST["Price"];
    //     $prod_stock = $_POST["Stock"];

    //     $ins = "INSERT INTO Product VALUES ({$prod_id}, '{$prod_name}', '{$prod_cat}',{$prod_price},{$prod_stock})";
    //     mysqli_query($conn, $ins);
    // }


    
    // mysqli_close($conn);
?>