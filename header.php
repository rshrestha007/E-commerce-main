<!DOCTYPE html>
<html>
<head>
	<title>Fashion</title>
	<meta charset="UTF-8">
    <meta name="description" content="test">
    <meta name="keywords" content="HTML, CSS, BOOTSTRAP">
    <meta name="author" content="Anik">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@700&display=swap" rel="stylesheet">
    <!--font-family: 'Raleway', sans-serif;-->
    <link rel="favicon" type="text/css" href="#favicon">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

</head>

<body>
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 

<!--header start--->
  <header>
    <div class="container">
      
        <div class="row">
          <div class="col-md-12 text-center">
            <a href=""><img src="img/logo.jpg"></a>
          </div>
        </div>
    
    
    </div>
  </header>
  <div class="line">

    
  </div>
<!--header end--->
<?php 
  SESSION_START();
 
  include "lib/connection.php";
  $id=$_SESSION['userid'];
 $sql = "SELECT * FROM cart where userid='$id'";
 $result = $conn -> query ($sql);
  
?>
<!--nav start--->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Clothing.php"> Bags</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Studios.php"> Studios</a>
        </li>
      
      </ul>
     
      <form class="form-inline"  action="search(1).php" method="post">
        <!--<a href=""><img src="img/search.png"></a>-->
        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="name">
        <button class="btn btn-outline-dark" type="submit" style="margin-left:7px;margin-right:7px;"><img src="img/search.png"></button>
        </form>
        <?php
          $total=0;
          if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
              $total++;
            }
          }
              ?>
        <a href="cart(1).php"><img src="img/cart.png"><?php echo $total?></a>

        <?php 

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']==1)
   {
    echo $_SESSION['username']; ?>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="Profile.php">My Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">  Logout</a>
        </li>
        
      
      </ul>
   
<?php

   }
}
else
{
?>

      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="Login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Register.php"> Register</a>
        </li>
      
      </ul>

<?php
}
?>
        

    </div>
  </div>
</nav>

<!--nav end--->