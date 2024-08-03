<?php
include "navbar.php";
session_start();
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
<div id="success_box" style="visibility:hidden; position:absolute;">
<div class="alert alert-success alert-dismissible fade show" role="alert" >
  <strong id="login_success">!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closebox()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>

<div class="body">
<style>
    .button3:hover{
        background-color: blue;
        color: white;
    }
</style>
<div class="card2">
  <form class="form"  method="POST">
    <p id="heading">Vacancy-Verse Register</p>
    <div class="field">
      <svg
        viewBox="0 0 16 16"
        fill="currentColor"
        height="16"
        width="16"
        xmlns="http://www.w3.org/2000/svg"
        class="input-icon"
      >
        <path
          d="M13.106 7.222c0-2.967-2.249-5.032-5.482-5.032-3.35 0-5.646 2.318-5.646 5.702 0 3.493 2.235 5.708 5.762 5.708.862 0 1.689-.123 2.304-.335v-.862c-.43.199-1.354.328-2.29.328-2.926 0-4.813-1.88-4.813-4.798 0-2.844 1.921-4.881 4.594-4.881 2.735 0 4.608 1.688 4.608 4.156 0 1.682-.554 2.769-1.416 2.769-.492 0-.772-.28-.772-.76V5.206H8.923v.834h-.11c-.266-.595-.881-.964-1.6-.964-1.4 0-2.378 1.162-2.378 2.823 0 1.737.957 2.906 2.379 2.906.8 0 1.415-.39 1.709-1.087h.11c.081.67.703 1.148 1.503 1.148 1.572 0 2.57-1.415 2.57-3.643zm-7.177.704c0-1.197.54-1.907 1.456-1.907.93 0 1.524.738 1.524 1.907S8.308 9.84 7.371 9.84c-.895 0-1.442-.725-1.442-1.914z"
        ></path>
      </svg>
      <input
        type="text"
        class="input-field"
        name="username"
        placeholder="Username"
        autocomplete="off"
      />
    </div>
    <div class="field">
      <i class="fa fa-envelope" style="font-size: 15px"></i>
      <input
        type="text"
        class="input-field"
        name="email"
        placeholder="Email"
        autocomplete="off"
      />
    </div>
    <div class="field">
      <svg
        viewBox="0 0 16 16"
        fill="currentColor"
        height="16"
        width="16"
        xmlns="http://www.w3.org/2000/svg"
        class="input-icon"
      >
        <path
          d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"
        ></path>
      </svg>
      <input type="password" class="input-field" placeholder="Password" name="password" required />
    </div>
  

   


    <div class="btn">
     <input type="submit" value="Register Now" class="button1" name="submit">

<a href="login.php">
    <button class="button2">
        <a href="login.php" style="text-decoration: none;">Already have Account</a>
        </button>
        </a>

    </div>
    <button class="button3">
        <input type="checkbox" name="terms" id="terms" checked>Agree to <a href="terms.html" style="color: rgb(65, 154, 6);">Terms and Conditions</a></button>
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

<?php
try{

if(isset($_POST['submit'])){
   
    include "connectdb.php";
    $username=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $session_id=md5(rand(1000000000,9999999999));
    $check="SELECT * FROM users WHERE username='$username'";
    $test=mysqli_query($conn,$check);
    if(mysqli_num_rows($test)>0){
        echo "<script> error_msg.innerHTML='Username Already Exists'; error_box.style.visibility='visible'; error_box.style.position='relative'</script>";
    }
    else{
    $sql="INSERT INTO users(username,email,password,session_id) VALUES('$username','$email','$password','$session_id')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>  window.location.href='user.php?Login-Successfull';</script>";  
        $_SESSION['session_id']=$session_id;
    }
    else{
        echo "<script> error_msg.innerHTML='Registration Failed'; error_box.style.visibility='visible'; error_box.style.position='relative'</script>";
    }
}
}
}
catch(Exception $e){
    echo "<script> error_msg.innerText='Error Occured'; error_box.style.visibility='visible'; error_box.style.position='relative'</script>";
}

?>