<?php
    include("database.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login Form</title>
</head>
<body>
<header>
        <h1>Login</h1>
    </header>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Username</label>
        <input type="text" name="username">
        <label>Password</label>
        <input type="password" name="password" id="">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
    if (isset($_POST["login"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $chk = "SELECT * FROM delivery_user WHERE Username = '$username' AND Password = '$password'";
        $res = mysqli_query($conn, $chk);
        $row = mysqli_fetch_assoc($res);

        if ($row > 1) {
            header("location:index.php");
            exit;
        } else {
            echo '<div class="error-box">Error: Invalid username or password</div>';
        }
    }
    ?>
