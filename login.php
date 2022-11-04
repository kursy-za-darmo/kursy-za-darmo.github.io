<?php

session_start();
require_once "connect.php";
$connect=@new mysqli( $host,$db_user,$db_password,$db_name);
if($connect->connect_errno!=0)
{
    echo $connect->connect_errno;
    echo $connect->connect_error;
}
else
{
    if($result = $connect->query("SELECT * FROM users "))
    {
        $rowsCount = $result->num_rows;

        if($rowsCount != 0)
        {
            $data = $result->fetch_assoc();

            $_SESSION['ID_User']=$data['id'];
            $_SESSION['Login']=$data['login'];
            $_SESSION['Password']=$data['password'];
            $_SESSION['Email']=$data['email'];
            

            $result->free_result();
           header("Location: acount.php");
        }
        else
        {
            echo "Nie ma cie w bazie danych!";
        }
    }
}
$connect->close();

?>