<?php
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM product,bags";
 $result = $conn -> query ($sql);

 if(isset($_POST['add_to_cart'])){

if(isset($_SESSION['auth']))
{
   if($_SESSION['auth']!=1)
   {
       header("location:login.php");
   }
}
else
{
   header("location:login.php");
}
  $user_id=$_POST['user_id'];;
  $product_name = $_POST['product_name'];
  $product_price = $_POST['product_price'];
  $product_id = $_POST['product_id'];
  $product_quantity = 1;

  $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE productid = '$product_id'  && userid='$user_id'");

  if(mysqli_num_rows($select_cart) > 0){
    echo $message[] = 'product already added to cart';

  }else{
     $insert_product = mysqli_query($conn, "INSERT INTO `cart`(userid, productid, name, quantity, price) VALUES('$user_id', '$product_id', '$product_name', '$product_quantity', '$product_price')");
   echo $message[] = 'product added to cart succesfully';
   header('location:index.php');
  }

}

?>



<!--banner start-->
<div class="banner">
<div class="container">
  <div class="row">
    <div class="col-md-6">
    
        <div class="banner-text">
          <p class="bt1">Welcome To</p>
          <p class="bt2"><span class="bt3">Tachis</span> Store</p>
          
          
        </div>
  
      
    </div>
    
  <div class="col-md-6">
    
      <img src="" class="img-fluid">
 
  </div>

  </div>
</div>
</div>

<!--banner end-->


<!---top sell start---->

<section>
  <div class="container">
    <div class="topsell-head">
      <div class="row">
        <div class="col-md-12 text-center">
          <img src="img/mark.png">
          <h4>Trending Products</h4>
          <p>From Tachis </p>

        </div>
        
        
      </div>

    </div>

  <div>
    <div class="row">
    
      <div class="col-lg-6 text-center">
      <a href="clothing.php">
       <img width="250" height="350" src="img/g1.jpg">
</a>
        <p>Bags</p>
      </div>
      <div class="col-lg-6 text-center">
        
        <a href="Studios.php">
        <img width="250" height="350" src="img/g2.jpg">
        </a>
        <p>Studios</p>
      </div>   
  </div>
</div>
</div>

</section>
      </br>
      
<div class="welcome">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-6 col-sm-12">
        <span class="welcometitle">Welcome to Tachis</span>
        <img src="img/titleful.png">
        <img src="img/titleline.png" class="titleline">

        <div class="row" id="wel1">
          <div class="col-md-2 col-lg-2 col-2">
            <img width="90" height="90" src="img/logo1.jpg" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">Tachis Bags</h6>
            <p class="wp">We're on a misison to make your life a little earier.One bag at a time. </p>
          </div>   
        </div>

        <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img width="90" height="90" src="img/logo2.jpg" class="w" class="img-fluid">
          </div>
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">Tachis Studios</h6>
            <p class="wp">Proudly Made in Nepal</p>
          </div>   
        </div>

        <div class="row" id="wel2">
          <div class="col-md-2 col-lg-2 col-2">
            <img width="90" height="90"src="img/logo3.jpg" class="w" class="img-fluid">
          </div>
          
          <div class="col-md-10  col-lg-10 col-10">
            <h6 class="wh">Tachis Beauty</h6>
            <p class="wp">Made with love.Vegan and cruelty Free.</p>
          </div>   
        </div>

      
    </div>
  </div>
</div>
</div>
<?php
 include'footer.php';
?>

