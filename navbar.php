<?php

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
    <title>Vacancy-Verse</title>
    
    <link rel="stylesheet" href="navbar.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="user.css">
    <link rel="stylesheet" href="post.css">
    <link rel="stylesheet" href="index.css">

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>

    <nav>
      <div class="button-container">
        <a href="index.php" style="text-decoration: none;">
          <button class="button">
            &nbsp;<i class="fa fa-home" style="font-size: 21px"></i> &nbsp;<span class="htext">Home</span>
          </button>
        </a>
        <a href="search.php" style="text-decoration: none;">
          <button class="button">
            &nbsp;<i class="fa fa-search" style="font-size: 19px"></i>&nbsp;<span class="htext">Search</span>
          </button>
        </a>
        <a href="post.php" style="text-decoration: none;">
          <button class="cssbuttons-io">
            <span>
              <i class="fa fa-plus" style="font-size: 15px"></i>&nbsp;Post
            </span>
          </button>
        </a>
      <a href="save.php" style="text-decoration: none;">
  <button class="button">
    &nbsp;<i class="fa fa-inbox" style="font-size: 21px"></i>
    
    &nbsp;<span class="htext">Saved </span>
      <!-- <span class="msg-count">9</span> -->
   
    
  </button>
</a>
        <a href="user.php" style="text-decoration: none;">
          <button class="button">
            &nbsp;<i class="fa fa-user" style="font-size: 20px"></i> &nbsp;<span id="plog" class="htext">Profile</span>
          </button>
        </a>
      </div>
    </nav>

