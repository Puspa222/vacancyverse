<?php
include "connectdb.php";
include "navbar.php";
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div id="error_box" style="visibility:hidden; position:absolute;">
<div class="alert alert-danger alert-dismissible fade show" role="alert" >
  <strong id="login_error">!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closebox()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

<div class="body">

<!-- <img id="loginlogo" src="user.jpg" alt=""> -->
    <div class="card2">
        <form class="form" method="POST">
            <p id="heading">Forget Password</p>
            <div class="field">
            <i class="fa fa-envelope" style="font-size: 15px"></i>

                <input type="email" name="email" class="input-field" placeholder="Email Here" autocomplete="off" />
            </div>
          <br>
           
             <button class="button3" type="submit" name="submit"><a href="forget.php" style="text-decoration:none; color:white;">Send OTP</a></button>
        </form>
    </div>
</div>


<script>
let error_msg=document.getElementById("login_error");
let success_msg=document.getElementById("login_success");
let error_box=document.getElementById("error_box");
let success_box=document.getElementById("success_box");

function closebox(){
    error_box.style.visibility="hidden";
    success_box.style.visibility="hidden";
    error_box.style.position="absolute";
    success_box.style.position="absolute";
}
</script>
<!-- <?php

// if(isset($_POST['submit']))
// {
//     $email=$_POST['email'];
//     $query="SELECT * FROM users WHERE email='$email'";
//     $result=mysqli_query($conn,$query);
//     $row=mysqli_fetch_assoc($result);
//     $count=mysqli_num_rows($result);
//     if($count==0)
//     {
//         echo "<script> error_msg.innerHTML='Email not found'; error_box.style.visibility='visible'; error_box.style.position='relative';</script>";
//     }
//     else
//     {
//         $to=$email;
//         $subject="OTP";
//         $otp=rand(100000,999999);
//         $_SESSION['otp']=$otp;
//         $message="Your OTP is ".$otp;
//         $headers="From: debrisexplore@gmail.com";
//         mail($to,$subject,$message,$headers);
//       //  echo "<script> window.location.href='otp.php';</script>";
//     }
// }



?>
 -->
