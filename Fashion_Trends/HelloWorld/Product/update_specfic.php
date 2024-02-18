<?php
include ("database.php");
?>
<?php
    $prod_id = "";
    $prod_name= "";
    $prod_cat = "";
    $prod_price= "";
    $prod_stock = "";
    $prod_type = "";

    try{if($_SERVER["REQUEST_METHOD"]=='GET'){
        if(!isset($_GET['Product_id'])){
          header("location:product.php");
          exit;
        }
        $prod_id = $_GET['Product_id'];
        $sql = "SELECT * from PRODUCT WHERE Product_id={$prod_id}";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        while(!$row){
            header("location:product.php");
            exit;
        }
        $prod_name=$row["Product_Name"];
        $prod_type= $row["Bodytype"];
        $prod_cat = $row["Category"];
        $prod_price= $row["Price"];
        $prod_stock = $row["Stock"];
    
      }
      else{
        $prod_id = $_POST["prod_id"];
        $prod_name = $_POST["prod_name"];
        $prod_type= $_POST["prod_type"];
        $prod_cat=$_POST["prod_cat"];
        $prod_price=$_POST["prod_price"];
        $prod_stock=$_POST["prod_stock"];

        $sql = "UPDATE Product SET Product_Name='$prod_name', Category='$prod_cat', Price=$prod_price, Stock=$prod_stock, Bodytype = '$prod_type' WHERE Product_id = $prod_id";
        // echo $sql;
        $result = $conn->query($sql);
        header("location:product.php");
                    exit;
      }
    }catch(mysqli_sql_exception){
        echo '<div class="error-box">Error : Enter valid data!</div>';

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="update_Specfic.css">

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
    

        <!-- <label>Product Id</label> -->
        <input type="hidden" name="prod_id" placeholder="eg. 1, 2..." value="<?php echo $prod_id; ?>">

        <label>Product Name</label>
        <input type="text" name="prod_name" placeholder="eg. Leather Jacket" value="<?php echo $prod_name; ?>">

        <label>Product Category</label>
        <input type="Text" name="prod_cat" placeholder="eg. Apparel" value="<?php echo $prod_cat; ?>">

        <label>Product Bodytype</label>
        <input type="Text" name="prod_type" placeholder="eg.  Mesomorph" value="<?php echo $prod_type; ?>">

        <label>Price</label>
        <input type="number" name="prod_price" placeholder="eg. 150, 300.." value="<?php echo $prod_price; ?>">

        <label>Stock</label>
        <input type="number" name="prod_stock" placeholder="eg. 50, 30.." value="<?php echo $prod_stock; ?>">

        <input type="submit" name="Update" value="Update">
    </form>

</body>
</html>
    
