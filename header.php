<?php

session_start();
error_reporting(0)
?>
<!Doctype html>

<html>
<head>
  <title>Contact System</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="includes/bootstrap.css" >
  <link rel="stylesheet" type="text/css" href="includes/cerulean.css">

  <!--Includes CSS into the header -->
  <!--Adding the base javascript and jquery-->
  <script src="includes/jquery.js"></script>
  <script src="includes/bootstrap.js"></script>


  <style type="text/css">
    html{
      font-family:Arial;
      
    }
    body{
      margin-top:auto; 
      margin-left:10%;
      margin-right:10%;  
      background: url(include/img/drug.jpg) no-repeat center center fixed; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
     
    }
  </style>
  
</head>
<body class="container">

  <div class="navbar navbar-default" style="font-size:1.1em; font-weight:bold; heigh:30px;">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Contacts System</a>
    </div>
    <div class="navbar-collapse collapse navbar-inverse-collapse">
      <ul class="nav navbar-nav">
        <li><a href="addcontact.php"  >Add Contact</a></li>
        <li><a href="addactivity.php"  >Add Activity</a></li>
        <li><a href="viewcontacts.php"  >View Contacts</a></li>
        
        <li><a href= "contactus.php"  >Contact Us</a></li>
        

      </ul>
    </li>
  </ul>

  <ul class="nav navbar-nav navbar-right">
   
    <?php

// Inialize session
// Check, if username session is NOT set then this page will jump to login page
    if(!isset($_SESSION['username'])){

     echo <<<'TAG'
<li class="dropdown"  data-toggle="tab">
     <a class="dropdown-toggle" href="#" data-toggle="dropdown">Admin Login <strong class="caret"></strong></a>
     <div class="dropdown-menu" style="padding: 15px; padding-bottom: 0px; background-image:url(include/background.gif);">
      <form method="post" action="loginproc.php"  id="formLogin" accept-charset="UTF-8">
        <input type="text" autofocus="" required="" placeholder="Username"  name="username" style="margin-bottom: 15px; width:250px;" class="form-control"><br >
        <input type="password" required="" placeholder="Password" name="password" style="margin-bottom: 15px; width:250px;" class="form-control">
        <input style="float: left; margin-right: 10px;" type="checkbox" name="remember-me" id="remember-me" value="1">
        <label class="string optional" for="user_remember_me" > Remember me</label>
        <input class="btn btn-primary btn-block" type="submit" id="sign-in" value="Sign In" style="margin-bottom: 15px; width:250px;">

      </form>
    </div>
  </li>
TAG;
}else{
 echo "<li><a href='addcontact.php'>Dashboard </a></li>";

 echo "<li><a href='includes/logout.php'>Log out</a></li>";
}
?>
</ul>
</div>
</div>
<div class="container" >
