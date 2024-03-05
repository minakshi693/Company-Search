<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "company";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if($conn){
   // echo "connection Successful";
}
else{
    die("connection failed" .mysqli_connect_error());
}
?>