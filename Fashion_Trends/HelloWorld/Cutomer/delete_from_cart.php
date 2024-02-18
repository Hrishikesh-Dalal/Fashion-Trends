<?php
include ("database.php");
if(isset($_GET['Product_id'])){
    // $id = $_GET['Product_id'];
    $id = $_GET['Product_id'];
    $cust_id = $_GET['cust_id'];
    
    echo $id;
    echo $cust_id;
    $quer = "DELETE FROM cart where cust_id = $cust_id and Product_id = $id";
    $res = mysqli_query($conn, $quer);
    header("location:product.php?cust_id={$cust_id}");
    
    exit;
}
exit;
?>

<!-- <?php
//  if(isset($_POST['Delete'])){
//     if(
//         isset($_POST["Product_id"]) && !empty($_POST["Product_id"]) &&
//         empty($_POST["Product_Name"])

//         // isset($_POST["Product_Name"]) && !empty($_POST["Product_Name"])
//     ){
//         $prod_id = $_POST["Product_id"];
//         $del = "DELETE FROM Product WHERE Product_id = {$prod_id}";
//         if(mysqli_query($conn, $del)){
//             echo "Deletion successful";
//         } else {
//             echo "Error deleting record: " . mysqli_error($conn);
//         }
        

//     }else if(
//         isset($_POST["Product_Name"]) && !empty($_POST["Product_Name"]) &&
//         empty($_POST["Product_id"])
//     ){
//         $prod_name = $_POST["Product_Name"];
//         $del = "DELETE FROM Product WHERE Product_Name = '{$prod_name}'";
//         if(mysqli_query($conn, $del)){
//             echo "Deletion successful";
//         } else {
//             echo "Error deleting record: " . mysqli_error($conn);
//         }

//     }else if(
//         isset($_POST["Product_id"]) && !empty($_POST["Product_id"]) &&
//         isset($_POST["Product_Name"]) && !empty($_POST["Product_Name"])
//     ){
//         $prod_id = $_POST["Product_id"];
//         $prod_name = $_POST["Product_Name"];
//         $del = "DELETE FROM Product WHERE Product_Name = '{$prod_name}' AND Product_id = {$prod_id}";
//         if(mysqli_query($conn, $del)){
//             echo "Deletion successful";
//         } else {
//             echo "Error deleting record: " . mysqli_error($conn);
//         }
//     }

// }else{
//     echo "Error: Provide either Product ID or Product Name for deletion.";
// }
?> -->