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
  <div>
  <div class="profile">
    <div class="profile-pic">
      <img src="uploads/malejob.png" alt="Profile Picture" class="profile-image">
    </div>
    <div class="profile-details">
      <p class="profile-name">Username: <?php echo $row1['username'] ?></p>
      <p class="profile-email">Email: <?php echo $row1['email'] ?></p>
    </div>
  </div></div>
  <div class="addi">
    <button><a href="settings.php" class="sett">Settings</a></button>
  </div>
</div>


<?php
include "userpost.php";
?>
