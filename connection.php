<?php

session_start();


class Connection
{
    public $host = "localhost";
    public $user = "root";
    public $password = "";
    public $db_name = "oop_reglogin";
    public $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
    }
}


class Register extends Connection
{
    public function registration($name, $username, $email,  $password, $confirmpassword)
    {
        $duplicate = mysqli_query($this->conn, "SELECT * FROM user WHERE username = '$username' OR email = '$email' ");
        if (mysqli_num_rows($duplicate) > 0) {
            return 10;
            //username or password has been taken
        } else {
            if ($password == $confirmpassword) {
                $query = "INSERT INTO user VALUES ('','$name','$username','$email', '$password')";
                mysqli_query($this->conn, $query);

                return 1;
                //registration successful
            } else {
                return 100;
                //password doesnot match
            }
        }
    }
}


class Login extends Connection
{
    public $id;
    public function login($username, $password)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM user WHERE username= '$username' OR password='$password'");
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) > 0) {
            if ($password == $row['password']) {
                $this->id = $row['id'];
                return 1;
            } else {
                return 10;
            }
        } else {
            return 100;
        }
    }

    public function idUser()
    {
        return $this->id;
    }
}



class Select extends Connection
{
    public function selectUserById($id){
        $result = mysqli_query($this->conn , "SELECT * FROM user WHERE id = '$id'");
        return mysqli_fetch_assoc($result);
    }


}
