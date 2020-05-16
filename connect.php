<?php

$dbhost = 'localhost:8111';
$username = 'root';
$password = '';
$db = 'hotel_database';
try {
    if( $con = mysqli_connect($dbhost,$username,$password,$db))
           {
            $mydb = mysqli_select_db($con,$db);
        echo "Connected!";
        if($mydb)
        {
            echo "Database was found!";
        }
        else
        {
            echo "Error in connection";
        }
           }
    else
        {
        throw new Exception('Unable to connect');
    }

    }
  catch(Exception $e)
{
    echo $e->getMessage();
}
?> 