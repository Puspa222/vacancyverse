<?php
session_start();
include "connectdb.php";
$pid=$_GET['pid'];
$sid=$_SESSION['session_id'];
$sql="INSERT INTO savedposts (post_id,session_id) VALUES ('$pid','$sid')";
if(mysqli_query($conn,$sql)){
    echo "<script> window.location.href='index.php?saved';</script>";
}
else{
    echo "Error";
}