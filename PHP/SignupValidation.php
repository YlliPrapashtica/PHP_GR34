<?php

require 'connect.php';

$username = mysqli_real_escape_string($con, $_POST['user']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$password = mysqli_real_escape_string($con, $_POST['pass']);
$password1 = mysqli_real_escape_string($con, $_POST['pass1']);


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
} else{

$sql = "INSERT INTO guests (username, guest_email, guest_pass) VALUES (?,?,?)";
if($con->query($sql) === TRUE){
echo "Record Added Sucessfully";
}
else
{
echo "Error" . $sql . "<br/>" . $con->error;
}
//     $sql = mysqli_query($con, "SELECT username FROM guests WHERE username =?");
//     $row = mysqli_num_rows($sql);
//     // $sql = 'SELECT username FROM guests WHERE username=?';
//     // $stmt = mysqli_stmt_init($con);
//     if(!mysqli_stmt_prepare($sql)){
//         header("Location: Signup.php?error=sqlerror");
    
//         } else{
//             mysqli_stmt_bind_param($stmt, "s", $username);
//             mysqli_stmt_execute($stmt);
//             mysqli_stmt_store_result($stmt);
//             $result = mysqli_stmt_num_rows($stmt);
//             if($result>0){
//                 header("Location: Signup.php?error=usertaken&email=".$email);
//                 exit();
//             } else{
                
//                 $sql = 'INSERT INTO guests (username, guest_email, guest_pass) VALUES (?,?,?)';
//                 $stmt = mysqli_stmt_init($con);
//                 if(!mysqli_stmt_prepare($stmt, $sql)){
//                     header("Location: Signup.php?error=sqlerrrrrrrrrrrror");
//                     exit();
//                 } else{
//                     $hashedPass = password_hash($password, PASSWORD_DEFAULT);
//                     mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPass);
//                     mysqli_stmt_excecute($stmt);
//                     header("Location: Signup.php?Signup=success");
//                     exit();
//                 }
//             }
//         }

//   mysqli_stmt_close($stmt);
// mysqli_close($con);  
}





include('Signup.php');
?>