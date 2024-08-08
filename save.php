<style>
    .image{
        width: 100%;
        
        object-fit: cover;
    }
    #checkboxInput {
  display: none;
}
.bookmark {
  cursor: pointer;
  background-color: teal;
  width: 45px;
  height: 45px;
  display: flex;
  align-items: center;
  justify-content: center;
  border-radius: 10px;
}
.svgIcon path {
  stroke-dasharray: 200 0;
  stroke-dashoffset: 0;
  stroke: white;
  fill: #dddddd00;
  transition-delay: 0s;
  transition-duration: 0.5s;
}

#checkboxInput:checked ~ .svgIcon path {
  fill: white;
  animation: bookmark 0.5s linear;
  transition-delay: 0.5s;
}
.savepost{
    position: absolute;
    margin-left:39%;
    margin-top:-3% ;
}
@keyframes bookmark {
  0% {
    stroke-dasharray: 0 200;
    stroke-dashoffset: 80;
  }
  100% {
    stroke-dasharray: 200 0;
  }
}
</style>
<?php
include "navbar.php";

?>
<div class="body">
        <div class="posts">
            <?php

include "connectdb.php";
session_start();

if(!isset($_SESSION['session_id'])){
    echo "<script> window.location.href='login.php';</script>";
}
$session_id=$_SESSION['session_id'];
$sql="select * from savedposts where session_id='$session_id'";
$result1=mysqli_query($conn,$sql);
if(mysqli_num_rows($result1)>0){
    while($row=mysqli_fetch_assoc($result1)){
        $pid=$row['post_id'];
        $get="SELECT * FROM post WHERE post_id='$pid'";
        $result=mysqli_query($conn,$get);
       
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
  
        $title=$row['title'];
        
        echo "<div class='cardbox'>  <div class='header'> <div class='full'> <h2 class='title'>Job: $title</h2> <div class='itemofpost'>";
      
        echo '  <div class="stars">
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
        </svg>
      </div></div>';
        $name=$row['user'];
        $salary=$row['salary'];
        $location=$row['location'];
        $jobtype=$row['jobtype'];
       
        $contact=$row['contact'];
        $time=$row['time'];
       
        echo " <div class='sep'><p class='name time'>Posted on: $time</p>  <p class='contact name'>Contact: $contact</p></div>";
        echo " <div class='sep'><p class='name time'>Location: $location</p>  <p class='contact name'>Job Type: $jobtype</p></div>";
        echo "<div class='sep'><p class='name nname'>Posted By:$name</p> <p class='name' > Salary: $salary  </p></div></div></div>";
        $image=$row['image'];
        if($image!=""){
            echo "<img src='$image' class='image'>";
        }
        $message=$row['description'];
        echo "<p class='message'>".nl2br(htmlspecialchars($message))."</p></div>";
      



        
}
}
}

}

?>
            </div>
            </div>   

       