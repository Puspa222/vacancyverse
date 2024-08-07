<?php
include "navbar.php";
include "connectdb.php";

?>
<style>
    .group {
  display: flex;
  margin-top: 100px;
  line-height: 28px;
  align-items: center;
  position: relative;
  max-width: 190px;
}

.input {
  height: 40px;
  line-height: 28px;
  padding: 0 1rem;
  width: 100%;
  padding-left: 2.5rem;
  outline: none;
  background: linear-gradient(180deg,     rgb(56, 56, 56) 0%, rgb(36, 36, 36)   66%, rgb(41, 41, 41) 100%);
  color: #fff;
  transition: .3s ease;
  border: 2px solid;
  border-image: conic-gradient( #00F260, #0575E6,#64f38c) 1;
}

.input::placeholder {
  color: #fff;
}

.input:focus::placeholder {
  color: #999;
}

.icon {
  position: absolute;
  left: 1rem;
  fill: #fff;
  width: 1rem;
  height: 1rem;
}
.image{
        width: 100%;
        
        object-fit: cover;
    }
    .checkboxInput {
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

}

.savepost{
   display: flex;

    

}

.bin-button {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 48px;
  height: 48px;
  border-radius: 15px;
  background-color: rgb(255, 95, 95);
  cursor: pointer;
  border: 3px solid rgb(255, 201, 201);
  transition-duration: 0.3s;
  margin-left: 14px;
}
.bin-bottom {
  width: 15px;
}
.bin-top {
  width: 17px;
  transform-origin: right;
  transition-duration: 0.3s;
}
.bin-button:hover .bin-top {
  transform: rotate(45deg);
}
.bin-button:hover {
  background-color: rgb(255, 0, 0);
}
.bin-button:active {
  transform: scale(0.9);
}

</style>
<div class="body">
<form method="POST">
<div class="group">
    <svg viewBox="0 0 24 24" aria-hidden="true" class="icon">
        <g>
            <path d="M21.53 20.47l-3.66-3.66C19.195 15.24 20 13.214 20 11c0-4.97-4.03-9-9-9s-9 4.03-9 9 4.03 9 9 9c2.215 0 4.24-.804 5.808-2.13l3.66 3.66c.147.146.34.22.53.22s.385-.073.53-.22c.295-.293.295-.767.002-1.06zM3.5 11c0-4.135 3.365-7.5 7.5-7.5s7.5 3.365 7.5 7.5-3.365 7.5-7.5 7.5-7.5-3.365-7.5-7.5z"></path>
        </g>
    </svg>
    <input class="input" type="search" placeholder="Search" name="query">
    
</div>
</form>
</div>


<div id="error_box" style="visibility:hidden; position:absolute;">
<div class="alert alert-danger alert-dismissible fade show" role="alert" >
  <strong id="login_error">!</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="closebox()">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
</div>
<div class="body" style="display:flex; flex-direction:column;">
<?php


if(isset($_POST['query']))
{
    $query=$_POST['query'];
    $get="SELECT * FROM post WHERE title LIKE '%$query%' OR description LIKE '%$query%' OR location LIKE '%$query%' OR jobtype LIKE '%$query%' OR salary LIKE '%$query%' OR contact LIKE '%$query%' OR user LIKE '%$query%' ORDER BY time DESC";
    $result=mysqli_query($conn,$get);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $title=$row['title'];
            $pid=$row['post_id'];
            
            echo "<div class='cardbox'>  <div class='header'> <div class='full'> <h2 class='title'>Job: $title</h2> <div class='itemofpost'>";
            echo '<div class="savepost"><label for="checkboxInput" class="bookmark" onclick="savepost('.$pid.')">
            <input type="checkbox" class="checkboxInput"  id="c'.$pid.'" />
            <svg
              width="15"
              viewBox="0 0 50 70"
              fill="none"
              xmlns="http://www.w3.org/2000/svg"
              class="svgIcon"
            >
              <path id="p'.$pid.'" 
                d="M46 62.0085L46 3.88139L3.99609 3.88139L3.99609 62.0085L24.5 45.5L46 62.0085Z"
                stroke="black"
                stroke-width="7"
              ></path>
            </svg>
          </label></div>';
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
            $msg=nl2br(htmlspecialchars($message));
            echo "<p class='message'>$msg</p></div>";
          
    
    
    
            
    }
    }
    else{
        echo "No result Found";
    }    
    

}

?>
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


function savepost(pid){
 
 let postid="p"+pid;
 let path=document.getElementById(postid);
 if(path.style.fill!="white"){
     path.style.fill="white";
 }
 else{
     path.style.fill="#dddddd00";
 }
}


</script>