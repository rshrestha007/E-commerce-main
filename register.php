<?php
 include'header.php';
 include'lib/connection.php';

 $sql = "SELECT * FROM product";
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
<?php

include "lib/connection.php";
$result = null;
  if (isset($_POST['u_submit'])) 
  {
    $f_name=$_POST['u_name'];
    $l_name=$_POST['l_name'];
    $email=$_POST['email'];
    $pass=md5($_POST['pass']);
    $cpass=md5($_POST['c_pass']);

    if ($pass==$cpass) 
    {
         $insertSql = "INSERT INTO users(f_name ,l_name, email, pass) VALUES ('$f_name', '$l_name','$email', '$pass')";

         if ($conn -> query ($insertSql)) 
         {
            $result="Account Open success";
            header("location:login.php");
         }
         else
         {
             die($conn -> error);
         }
    }
    else
    {
      $result="Password Not Match";
    }
  } 


 //echo $result_std -> num_rows;


?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>411</title>



</head>

<body class="bg-gradient-primary">

    <div class="container">

     <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                <?php echo $result;  ?>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="u_name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="l_name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="pass">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="c_pass">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block" name="u_submit">Register Account</button>
                            

                            <hr>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    </div>


</body>
<?php
 include'footer.php';
?>
</html>