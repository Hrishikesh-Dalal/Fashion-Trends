<?php
include ("database.php");
if(isset($_GET['Product_id'])){
    $id = $_GET['Product_id'];
    $cust_id = $_GET['cust_id'];
    
    echo $id;
    echo $cust_id;
    $quer = "SELECT cart_id FROM cart where cust_id = $cust_id";
    $res = mysqli_query($conn, $quer);
    $row = mysqli_fetch_assoc($res);
    if($row >= 1){
        $ins = "INSERT INTO cart VALUES ({$row['cart_id']}, {$cust_id}, {$id})";
        echo $ins;
        $res1 = mysqli_query($conn, $ins);

    }else{
        $fmax = "SELECT max(cart_id) FROM cart";
        // $fmax
        echo $fmax;
        $res2 = mysqli_query($conn, $fmax);

        $row2 = mysqli_fetch_assoc($res2);
        // echo $row2['cart_id'];
        if($row2 < 1){
            $cart_id = 1;
            $ins = "INSERT INTO cart VALUES ({$cart_id}, {$cust_id}, {$id})";
            echo $ins;
            $res1 = mysqli_query($conn, $ins);
        }else{
            $cart_id = $row2["cart_id"];
            $cart_id++;
            $ins = "INSERT INTO cart VALUES ({$cart_id}, {$cust_id}, {$id})";
            echo $ins;
            $res1 = mysqli_query($conn, $ins);
        }
    }
    header("location:product.php?cust_id={$cust_id}");
    exit;
    // echo $id;
    // $sql = "DELETE from Product WHERE Product_id = {$id} ";
    // echo $sql;
    // mysqli_query($conn, $sql);
    // header("location:product.php");
    // exit;
}
exit;
?>

