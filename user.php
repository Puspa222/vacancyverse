<?php
include "navbar.php";
include "connectdb.php";
session_start();
if(!isset($_SESSION['session_id'])){
    echo "<script> window.location.href='login.php';</script>";
}{
$session_id=$_SESSION['session_id'];

$sql = "SELECT * FROM users WHERE session_id='$session_id'";
$result = mysqli_query($conn,$sql);
$row1 = mysqli_fetch_assoc($result);}
?>


<div class="container-profile">
  <div class="profile">
    <div class="profile-pic">
      <img src="malejob.png" alt="Profile Picture" class="profile-image">
    </div>
    <div class="profile-details">
      <h1 class="profile-name"><?php echo $row1['username']  ?></h1>
      <p class="profile-email"><?php echo $row1['email']  ?></p>
      <form method="POST">

<input type="submit" value="Logout" name="logout">
</form>


<?php

if(isset($_POST['logout'])){
    session_destroy();
    echo "<script> window.location.href='login.php';</script>";
}






?>
    </div>
  </div>
</div>

<?php
include "userpost.php";
?>
