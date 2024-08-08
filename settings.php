<?php
session_start();
include "navbar.php";
include "connectdb.php";
?>

<style>
    .body{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #e0e0e0;
    }
    .changeform{
        margin-top: 22px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    

    }
    .log{
        color:red;
    }
    .h4{
        text-align: center;
        color: white;
        padding: 5px;
        margin-top: 6px;
    }
    .emsg  {
        margin-top: 10px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
<div id="error_box" style="visibility:hidden; position:absolute;">
<div class="alert alert-danger alert-dismissible fade show" role="alert" >
  <strong id="login_error">!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closebox()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>



<div class="body">
<div >

<form method="POST" class="posts">
<button name="back"> Back</button>

<input type="submit" class="log" value="Logout" name="logout">
</form>


<div class="changeform">
<form method='POST' class='form'>
<h4 style="color:white;" class="h4">Change Password</h4>

    <div class='field'>
    <i class='fa fa-lock' style='font-size: 15px'></i>
    <input type='password' name='oldpass' class='input-field' placeholder='Old Password' autocomplete='off' />
    </div>
    <div class='field'>
    <i class='fa fa-lock' style='font-size: 15px'></i>
    <input type='password' name='newpass' class='input-field' placeholder='New Password' autocomplete='off' />
    </div>
    <div class='field'>
    <i class='fa fa-lock' style='font-size: 15px'></i>
    <input type='password' name='confirmpass' class='input-field' placeholder='Confirm Password' autocomplete='off' />
    </div>
    <button class='button3' type='submit' name='submit'>Change Password</button>
    </form>
</div>
<div class="emsg">
<span style="color:red; text-align:center;">
<?php

if(isset($_POST['logout'])){
    session_destroy();
    echo "<script> window.location.href='login.php';</script>";
}
if(isset($_POST['back'])){
    echo "<script> window.location.href='user.php';</script>";
}


if(isset($_POST['submit'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $confirmpass=$_POST['confirmpass'];
    $session_id=$_SESSION['session_id'];
    $sql="SELECT * FROM users WHERE session_id='$session_id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    if($newpass==$confirmpass){
    if($oldpass==$row['password']){
       
            $sql="UPDATE users SET password='$newpass' WHERE session_id='$session_id'";
            if(mysqli_query($conn,$sql)){
                echo "<script>  window.location.href='user.php?msg=password changed';</script>";
            }
            else{
                echo "Something went wrong";
                        }
        }
        else{
            echo "Old Password does not match";
                }
    }
    else{
        echo "New Password and Confirm Password does not match";

            }
}





?>
</span>
</div>
</div>
</div>


<script>
    let changeform=document.querySelector(".changeform");
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
