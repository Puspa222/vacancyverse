<?php
$pid=$_GET['pid'];
include "connectdb.php";
$sql="DELETE FROM post WHERE post_id='$pid'";
if(mysqli_query($conn,$sql)){
    echo "<script> window.location.href='user.php?deleted';</script>";
}
else{
    echo "Error";
}



?>