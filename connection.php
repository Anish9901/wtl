<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "Auction"; 
$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn)
{
    die("Couldn't make connection: ".mysqli_connect_error());
}

?>