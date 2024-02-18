<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_details']))
{
    $delivery_id = mysqli_real_escape_string($con, $_POST['delete_details']);

    $query = "DELETE FROM deliver WHERE id='$delivery_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = " Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_details']))
{
    $delivery_id = mysqli_real_escape_string($con, $_POST['delivery_id']);

    $productname = mysqli_real_escape_string($con, $_POST['productname']);
    $deliveryid = mysqli_real_escape_string($con, $_POST['deliveryid']);
    $eod = mysqli_real_escape_string($con, $_POST['eod']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
   
    if ($eod >= date("Y-m-d")) {
       
        if($stock>0){

    $query = "UPDATE deliver SET productname='$productname', deliveryid='$deliveryid', eod='$eod', stock='$stock' WHERE id='$delivery_id' ";
    $query_run = mysqli_query($con, $query);


    if($query_run)
    {
        $_SESSION['message'] = "Details Updated Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Details Not Updated";
        header("Location: index.php");
        exit(0);
    }


}
else {
    $_SESSION['message'] = "Stock Left Cannot Be Negative.";
    header("Location: create.php");
    exit(0);
}
}
else{
$_SESSION['message'] = " Date is in the past. Please enter a date starting today";
header("Location: create.php");
exit(0);
}
}


if(isset($_POST['save_details']))
{
    $productname = mysqli_real_escape_string($con, $_POST['productname']);
    $deliveryid = mysqli_real_escape_string($con, $_POST['deliveryid']);
    $eod = mysqli_real_escape_string($con, $_POST['eod']);
    $stock = mysqli_real_escape_string($con, $_POST['stock']);
     
    if ($eod >= date("Y-m-d")) {
       
    if($stock>0){
    
    $query = "INSERT INTO deliver (productname,deliveryid,eod,stock) VALUES ('$productname','$deliveryid','$eod','$stock')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Order Details Created Successfully";
        header("Location: create.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = " Not Created";
        header("Location: create.php");
        exit(0);
    }
}
    else {
        $_SESSION['message'] = "Stock Left Cannot Be Negative.";
        header("Location: create.php");
        exit(0);
    }
    }
else{
    $_SESSION['message'] = " Date is in the past. Please enter a date starting today";
    header("Location: create.php");
    exit(0);
}
}

?>