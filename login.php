<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "user";

session_start();


$data = mysqli_connect($host, $user, $password, $db);

if ($data === false) {
    die("connection error");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "select * from login where username='" . $username . "' AND password='" . $password . "' ";

    $result = mysqli_query($data, $sql);

    $row = mysqli_fetch_array($result);

    if ($row["usertype"] == "user") {

        $_SESSION["username"] = $username;

        header("location:overview.php");
    } elseif ($row["usertype"] == "Admin") {

        $_SESSION["username"] = $username;

        header("location:overview2.php");
    } else {
        echo "username or password incorrect";
    }
}




?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="login.css">
</head>

<style>
    body {
        background-image: url('background.jpg');
    }

    .rcorners2 {
        border-radius: 50px;
        padding: 20px;
        width: 200px;
    }
</style>

<body>

    <center>

        <h1 class="badge bg-primary" style="font-size: 25px;">Login Form</h1>
        <br><br><br><br>
        <div class="rcorners2" style="background-color: white; width: 500px;">
            <br><br>
            <form action="#" method="POST" style="border: 1px solid #ccc">
                <div class="container">
                    <h1>Login</h1>
                    <p>Please enter email account and password to login</p>
                    <hr>

                    <label>username</label>
                    <input type="text" name="username" required>

                    <label>password</label>
                    <input type="password" name="password" required>
                    <div class="clearfix">
                        <button type="button" class="cancelbtn">Cancel</button>
                        <button type="submit" class="signupbtn">Sign Up</button>
                    </div>
                </div>
            </form>
            <br><br>
        </div>
    </center>

</body>

</html>