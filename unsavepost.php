<?php
session_start();
include "connectdb.php";
$pid=$_GET['pid'];
$sid=$_SESSION['session_id'];
$sql="DELETE FROM savedposts WHERE post_id='$pid' AND session_id='$sid'";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> window.location.href='index.php?unsaved';</script>";
}
else{
    echo "Error";
}