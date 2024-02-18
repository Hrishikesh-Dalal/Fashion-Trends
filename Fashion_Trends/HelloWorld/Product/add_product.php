<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="add_product.css">
    <title>Dark Theme Form</title>
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
        <h1>Add a Product</h1>
    </header>  
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Product Id</label>
        <input type="number" name="Product_id" placeholder="eg. 1, 2,..">

        <label>Product Name</label>
        <input type="text" name="Product_Name" placeholder="eg. Leather Jacket">

        <label>Product Category</label>
        <input type="Text" name="category" placeholder="eg. Apparel">

        
        <label>Product Bodytype</label>
        <input type="Text" name="prod_type" placeholder="eg.  Mesomorph">

        <label>Price</label>
        <input type="number" name="Price" placeholder="eg. 150, 300..">

        <label>Stock</label>
        <input type="number" name="Stock" placeholder="eg. 50, 30..">

        <input type="submit" name="enter" value="Enter">
    </form>

</body>
</html>
<?php
try{if(isset($_POST['enter'])){
            // Check if all required fields are set and not empty
            if (
                isset($_POST["Product_id"]) && !empty($_POST["Product_id"]) &&
                isset($_POST["Product_Name"]) && !empty($_POST["Product_Name"]) &&
                isset($_POST["category"]) && !empty($_POST["category"]) &&
                isset($_POST["prod_type"]) && !empty($_POST["prod_type"]) &&
                isset($_POST["Price"]) && !empty($_POST["Price"]) &&
                isset($_POST["Stock"]) && !empty($_POST["Stock"])
            ) {
                // All required fields are present and not empty
                $prod_id = $_POST["Product_id"];
                $prod_name = $_POST["Product_Name"];
                $prod_cat = $_POST["category"];
                $prod_type = $_POST["prod_type"];
                $prod_price = $_POST["Price"];
                $prod_stock = $_POST["Stock"];
        
                // SQL injection is a concern here. Consider using prepared statements.
                $ins = "INSERT INTO Product VALUES ({$prod_id}, '{$prod_name}', '{$prod_cat}', {$prod_price}, {$prod_stock}, '{$prod_type}')";
                
                // Execute the query
                mysqli_query($conn, $ins);
                echo "Insertion Successful!";
                header("location:product.php");
                    exit;
            
            } else {
                // Display an error message if any of the required fields are missing
                echo '<div class="error-box">Error: All fields are required.</div>';
            }
        }
    }catch(mysqli_sql_exception){
        echo '<div class="error-box">Error : Enter Proper Details!</div>';
        
    }
?>