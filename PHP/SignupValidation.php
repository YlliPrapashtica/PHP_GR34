<?php

require 'connect.php';

$username = mysqli_real_escape_string($con, $_POST['user']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['pass']);
$password1 = mysqli_real_escape_string($con, $_POST['pass1']);
$hid = 1;
$fn = "emri";
$ln = "mbiemri";


if(empty($username) || empty($email) || empty($password) || empty($password1)){

    header("Location: Signup.php?error=emptyfields&user=".$username."&email=".$email);
    exit();
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: Signup.php?error=invalidemail&user");
    exit();
} else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    header("Location: Signup.php?error=invalidemail&user=".$username);
    exit();
} else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
    header("Location: Signup.php?error=invaliduser&email=".$email);
    exit();
    
} else if($password !== $password1){
	header("Location: Signup.php?error=passwordcheck&user=".$username."&email=".$email);
    exit();
} else {

    $sql = 'SELECT username FROM guests WHERE username=?';
    $stmt = mysqli_stmt_init($con);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: Signup.php?error=sqlerror");

    } else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = mysqli_stmt_num_rows($stmt);
        if ($result > 0) {
            header("Location: Signup.php?error=usertaken&email=" . $email);
            exit();
        } else {
            $hashedPass = password_hash($password, PASSWORD_DEFAULT);

            $strs = "sss";
            $stmt = $con->prepare('INSERT INTO guests (guest_id, guest_first_name,guest_last_name, guest_email,hotel_id, username, guest_pass) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt ->bind_param( "sssssss",$id,$fn,$ln,$email ,$hid ,$username , $hashedPass);
            $stmt->execute();

        }
    }


    mysqli_stmt_close($stmt);
    mysqli_close($con);
}



include('Signup.php');
?>