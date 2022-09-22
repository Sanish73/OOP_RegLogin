<?php

use LDAP\Result;

require 'connection.php';

if(isset($_SESSION['id'])){
    header('Location: index.php');
}

$login = new Login();

if (isset($_POST['submit'])) {
    $result = $login->Login($_POST['username'], $_POST['password']);

    if($result ==1){

        $_SESSION["login"] = true;
        $_SESSION["id"] = $login->idUser();
        header("Location: index.php");

    }elseif($result==10){
        echo
        "<script>alert('Password is Incorrect')</script>";
        
    }elseif($result==100){
        echo
        "<script>alert('Login is unsuccessful')</script>";

    }




}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h3>Login</h3>
    <form action="" method="post">
        <fieldset>
            <legend>Login</legend>
            <label for="">Username</label>
            <input type="text" name="username" placeholder="Input username"><br>
            <lebel for="">Password</lebel>
            <input type="password" name="password" placeholder="Input Password"><br><br>

            <button type="submit" name="submit">Submit</button>
        </fieldset>
    </form>
    <br><br><br>
    <a href="registration.php">Register</a>
</body>

</html>