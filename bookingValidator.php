<?php

require 'connect.php';


$checkin = mysqli_real_escape_string($con, $_POST['check-in']);
$checkOut = mysqli_real_escape_string($con, $_POST['check-out']);
$room = mysqli_real_escape_string($con, $_POST['room']);
$adult = mysqli_real_escape_string($con, $_POST['adults']);
$child = mysqli_real_escape_string($con, $_POST['child']);
$id = mysqli_insert_id($con);
$hid = 1;




$dateTimestamp1 = strtotime($checkin); 
$dateTimestamp2 = strtotime($checkOut); 
//echo $fn;
echo "\n";
echo "\n";
//echo $ln;
echo "\n";
echo "\n";
echo $dateTimestamp1;
echo "\n";
echo "\n";
echo $dateTimestamp2;
echo "\n";
echo "\n";
echo "\n";
echo $room;
echo "\n";
echo "\n";
echo "\n";
echo $adult;
echo "\n";
echo "\n";
echo $child;


if(empty($checkin) || empty($checkOut) || empty($room) || empty($adult) || empty($child)){

    header("Location: booking.php?error=emptyfields");
    exit();
} else if(($dateTimestamp1 > $dateTimestamp2)){
    header("Location: booking.php?error=invaliddate");
    exit();
    
} 

    else {
    
    $sql18 = "SELECT room_number_booked, check_in_date, check_out_date 
                    FROM bookings
                    WHERE room_number_booked = $room AND
                    (check_in_date BETWEEN $dateTimestamp1 AND $dateTimestamp2) AND
                    (check_out_date BETWEEN $dateTimestamp1 AND $dateTimestamp2)";

    $result = mysqli_query($con, $sql18);
    if (!$result) {                                   
        header("Location: booking.php?error=sqlerror");

    } 
     else {                 
            $stmt = $con->prepare('INSERT INTO bookings (booking_id, check_in_date,check_out_date, hotel_hotel_id,room_number_booked) VALUES ( ?,?, ?, ?, ?)');
            
            $stmt ->bind_param( "sssss",$id,$checkin,$checkOut,$hid ,$room);
            
            if( $stmt->execute()){
                header("Location: booking.php");
                echo("Success");
            }



        
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);

}

include('booking.php');
