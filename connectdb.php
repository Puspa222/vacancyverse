<?php
$host = "localhost";
$dbname = "vacancy";
$dbUsername = "root";
$dbPassword = "";

$conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
if(!$conn){
    die("Unexpected Error Occured: ".mysqli_connect_error());
}

?>