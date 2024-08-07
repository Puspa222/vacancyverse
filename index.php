<?php
session_start();
include "navbar.php";
if(isset($_SESSION['session_id'])){
    include "view.php";
}
else{
    include "viewnot.php";
}

?>