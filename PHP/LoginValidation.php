<?php

require 'connect.php';

    $username = $_POST['user'];
    $password = $_POST['pass'];

    if(empty($username) || empty($password)){
        header("Location: Login.php?error=emptyfields");
    exit();
    } else{
        $sql= 'SELECT * FROM guests WHERE username=?';
        $stmt = mysqli_stmt_init($con);
        if(!mysqli_($stmt, $sql)){
            header("Location: Login.php?error=sqlerror");
            exit();
        }else{
            mysqli_stmt_bind_param($stmt, "ss", $username, $username);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
        if($row = mysqli_fetch_assoc($result)){
            $passcheck = password_verify($password, $row['guest_pass']);
            if($passcheck == false){
                header("Location: Login.php?error=wrongpassword");
                exit();
            } else if($passcheck == false){
                session_start();
                $_SESSION['userid'] = $row['username'];
                $_SESSION['guestid'] = $row['guest_id'];
                $_SESSION['gpass'] = $row['guest_pass'];

                header("Location: Login.php?Login=success");
                exit();
            } else{
                header("Location: Login.php?error=wrongpassword");
                exit();
            }
        } else{
            header("Location: Login.php?error=nouser");
            exit();
    }
}
mysqli_stmt_close($stmt);
mysqli_close($con);  
}
    include('Login.php')    

?>