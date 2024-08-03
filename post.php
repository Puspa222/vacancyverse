<?php
include "navbar.php";
session_start();
if(!isset($_SESSION['session_id'])){
  echo "<script> window.location.href='login.php';</script>";
}
include "connectdb.php";
$session_id=$_SESSION['session_id'];
$sql="SELECT * FROM users WHERE session_id='$session_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
?>
<style>
  .body{
    margin-top: -60px;
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
    <div class="card2">
      <form class="form" method="POST" enctype="multipart/form-data">
        <p id="heading">Post</p>
        <div class="group">
          <input placeholder="‎" type="text" name="title">
          <label for="name">Title</label>
        </div>
        <div class="group">
          <input placeholder="‎" type="text" name="contact">
          <label for="contact">Contact</label>
        </div>
        <div class="group">
          <input placeholder="‎" type="text" name="salary">
          <label for="salary">Salary</label>
        </div>
        <div class="group">
          <input placeholder="‎" type="text" name="location">
          <label for="location">Location</label>
        </div>
        <div class="job">
          <label for="jobtype">Job Type</label>
          <select name="jobtype" id="jobtype">
            <option value="Full Time">Full Time</option>
            <option value="Part Time">Part Time</option>
            <option value="Internship">Internship</option>
            <option value="Freelance">Freelance</option>
         </select>
        </div>
        <div class="group">
          <textarea placeholder="‎" id="description" rows="5" name="description"></textarea>
          <label for="description">Description</label>
        </div>
        <div class="kast">
          <input type="file" name="image" id="file" accept="image/*">
          <div class="sbtn">  
            <button class="but" type="submit" name="submit">
              <div class="svg-wrapper-1 ssbtn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                  <path fill="none" d="M0 0h24v24H0z"></path>
                  <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                </svg>
              </div>
              <span>Post</span>
            </button>
          </div>
        </div>
      </form>
    </div>
</div>

<?php
if(isset($_POST['submit'])){
    $user = $row['username'];
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);
    $salary = mysqli_real_escape_string($conn, $_POST['salary']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $jobtype = mysqli_real_escape_string($conn, $_POST['jobtype']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $file = $_FILES['image']['name'];
    $filetmp = $_FILES['image']['tmp_name'];
    $destinationfile = 'uploads/' . $file;

    if (move_uploaded_file($filetmp, $destinationfile)) {
        $sql = "INSERT INTO post(user, title, contact, description, image, salary, location, jobtype) VALUES('$user', '$title', '$contact', '$description', '$destinationfile', '$salary', '$location', '$jobtype')";
        $result = mysqli_query($conn, $sql);
        if($result){
          echo "<script> window.location.href='user.php';</script>";

        } else {
          echo "<script> error_msg.innerHTML='Post create failed!'; error_box.style.visibility='visible'; error_box.style.position='relative'</script>";

        }
    } else {
      echo "<script> error_msg.innerHTML='Image upload failed!'; error_box.style.visibility='visible'; error_box.style.position='relative'</script>";
    }
}
?>
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