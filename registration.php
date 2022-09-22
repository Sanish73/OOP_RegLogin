<?php
require 'connection.php';

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}



$register = new Register();

if (isset($_POST["submit"])) {
    $result = $register->registration($_POST["name"],  $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);



    if ($result == 1) {
        echo
        "<script>alert('Registration Success')</script>";
    } else if ($result == 10) {
        echo
        "<script>alert('Username 0r password has already taken')</script>";
    } else if ($result == 100) {
        echo
        "<script>alert('heeey')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOP_REGISTRATION</title>
</head>

<body>
    <h2>Registration</h2>
    <form action="" method="post">
        <fieldset>
            <legend>Register</legend>
            <label for="">Name:</label>
            <input type="text" name="name" placeholder="Enter Name" required value=""><br>
            <label for="">Username:</label>
            <input type="text" name="username" placeholder="Enter Username" required value=""><br>
            <label for="">Email:</label>
            <input type="email" name="email" placeholder="Enter Email" required value=""><br>
            <label for="">Password:</label>
            <input type="password" name="password" placeholder="Enter Password" required value=""><br>
            <label for="">Confirm Password:</label>
            <input type="password" name="confirmpassword" placeholder="Renter Password" required value=""><br>

            <button type="submit" name="submit">Submit</button><br><br><br><br>
        </fieldset>
    </form>

    <a href="login.php">Login?</a>
</body>

</html>