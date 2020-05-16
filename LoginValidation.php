<?php

require 'connect.php';
session_start();
$username = mysqli_real_escape_string($con, $_POST['user']);
$password = mysqli_real_escape_string($con, $_POST['pass']);

    if(empty($username) || empty($password)){
        header("Location: Login.php?error=emptyfields");
    exit();
    } else{
        $sql = 'SELECT username FROM guests';
        $stmt = mysqli_stmt_init($con);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: Login.php?error=sqlerror");
            exit();
        }else if(mysqli_stmt_prepare($stmt, $sql)){
        
            $sql = 
            $login = mysqli_query($con,"SELECT guest_id FROM guests WHERE username = '$username' and guest_pass = '$password'");

    
             if (mysqli_num_rows($login) == 1) {
           
            $_SESSION['username'] = $username;
             header('Location: loggedin.php');
               }
            else {
               $error = "Your Login Name or Password is invalid";
            }
            
        }
mysqli_stmt_close($stmt);
mysqli_close($con);  
}
    include('Login.php')    

?>