<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update_product.css">
    <title>Dark Theme Update Form</title>
</head>
<body>
    <nav>
        <a href="product.php">Home</a>
        <a href="add_product.php">Add a New Product</a>
        <a href="update_product.php">Update Any Product</a>
        <a href="login.php">Log out</a>
        
        <!-- Add more links as needed -->
    </nav>  
    <header>
        <h1>Update</h1>
    </header>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    

        <label>Product Id*</label>
        <input type="number" name="Product_id" placeholder="eg. 1, 2...">

        <label>Product Name</label>
        <input type="text" name="Product_Name" placeholder="eg. Leather Jacket">

        <label>Product Category</label>
        <input type="Text" name="category" placeholder="eg. Apparel">

        
        <label>Product Bodytype</label>
        <input type="Text" name="prod_type" placeholder="eg.  Mesomorph" >

        <label>Price</label>
        <input type="number" name="Price" placeholder="eg. 150, 300..">

        <label>Stock</label>
        <input type="number" name="Stock" placeholder="eg. 50, 30..">

        <input type="submit" name="Update" value="Update">
    </form>

</body>
</html>
<?php  
        try{if(isset($_POST['Update'])){
            // Check if Product_id is provided
            if(isset($_POST["Product_id"])) {
                $prod_id = $_POST["Product_id"];
                // echo $prod_id;
        // $id = $_GET['Product_id'];
                
                // Check if other attributes are provided
                $prod_name = isset($_POST["Product_Name"]) ? $_POST["Product_Name"] : null;
                $prod_cat = isset($_POST["category"]) ? $_POST["category"] : null;
                $prod_price = isset($_POST["Price"]) ? $_POST["Price"] : null;
                $prod_stock = isset($_POST["Stock"]) ? $_POST["Stock"] : null;
                $prod_type = isset($_POST["prod_type"]) ? $_POST["prod_type"] : null;

        
                // Construct the update query
                $count = 0;
                $updateQuery = "UPDATE Product SET ";
                if(($prod_name != null)){
                    $count++;
                }
                $updateQuery .= ($prod_name != null) ? "Product_Name = '{$prod_name}' " : "";
                if($prod_cat != null){
                    $count++;
                    if($count > 1)
                    $updateQuery .= ",";
                }
                $updateQuery .= ($prod_cat != null) ? "Category = '{$prod_cat}' " : "";
                if($prod_price != null){
                    $count++;
                    if($count > 1)
                    $updateQuery .= ",";
                }
                $updateQuery .= ($prod_price != null) ? "Price = {$prod_price} " : "";
                if($prod_stock != null){
                    $count++;
                    if($count > 1)
                    $updateQuery .= ",";
                }
                $updateQuery .= ($prod_stock != null) ? "Stock = {$prod_stock} " : "";
                if($prod_type != null){
                    $count++;
                    if($count > 1)
                    $updateQuery .= ",";
                }
                $updateQuery .= ($prod_type != null) ? "Bodytype = '{$prod_type}' " : "";
                $update = " WHERE Product_id = {$prod_id}";
                $updateQuery .= $update;
                // echo $updateQuery;
                // Execute the query
                if(mysqli_query($conn, $updateQuery)){
                    echo "Update successful";
                    header("location:product.php");
                    exit;
                } else {
                    echo '<div class="error-box">Error updating record: </div>';
                }
            } else {
                echo '<div class="error-box"> Error: Product ID is compulsory for updating.</div>';
            }
    }}catch(mysqli_sql_exception){
        echo '<div class="error-box">Error : Enter valid data!</div>';
        
    }
?>