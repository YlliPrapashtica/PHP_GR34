<?php

$dbhost = 'localhost';
$username = 'root';
$password = '';
$db = 'hotel_database';

$con = mysqli_connect($dbhost,$username,$password,$db);

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

?>