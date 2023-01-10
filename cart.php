<?php
include ('includes/connect.php');
include ('functions/function.php');
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ecommerce cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .card-img-top {
        width: 100%;
        height: 200px;
        object-fit: contain;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    a {
        text-decoration: none;
    }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info ">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="logo2.jpg" style="width:80px;height:80px;" /></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="display_all.php">products</a>
                        </li>
                        <?php
                            if(!isset($_SESSION['username'])){
                                echo " <li class='nav-item'>
                                <a class='nav-link' href='./users_area/user_registration.php'>register</a>
                            </li>";
                               }else{
                                echo " <li class='nav-item'>
                                <a class='nav-link' href='./users_area/profile.php'>profile</a>
                            </li>";
                               }
                               ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php"><i
                                    class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num(); ?></sup></a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>


        <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                  if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>welcome guest</a>
                </li>";
                   }else{
                    echo "<li class=''nav-item'>
                    <a class='nav-link' href=''>welcome ".$_SESSION['username']."</a>
                </li>";
                   }
               if(!isset($_SESSION['username'])){
                echo "<li class=''nav-item'>
                <a class='nav-link' href='./users_area/user_login.php'>login</a>
            </li>";
               }else{
                echo "<li class=''nav-item'>
                <a class='nav-link' href='./users_area/logout.php'>logout</a>
            </li>";
               }
                ?>
            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">hidden store</h3>
            <p class="text-center">communications is at the heart of e-commerce and community</p>
        </div>


        <div class="container">
            <div class="row">
                <form action="" method="POST">
                    <table id="t1" class="table table-bordered text-center">

                        <?php
   global $con;
   $get_ip_add = getIPAddress(); 
   $total_price=0;
$cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
    echo "    <thead>
    <tr>
        <th>Product title</th>
        <th>Product image</th>
        <th>Quantity</th>
        <th>Total price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
    </tr>
</thead>
<tbody> ";
while($row=mysqli_fetch_array($result)){
$product_id=$row['product_id'];
$select_products="SELECT * FROM `products`
WHERE product_id='$product_id'";
$resultnn=mysqli_query($con,$select_products);
while($row_product=mysqli_fetch_array($resultnn)){
$productn_price=array($row_product['product_price']);
$product_price=$row_product['product_price'];
$product_title=$row_product['product_title'];
$product_image=$row_product['product_image1'];
$productn_values=array_sum($productn_price);
$total_price+=$productn_values;
?>
                        <tr>
                            <td><?php echo $product_title ?></td>
                            <td><img src="./admin_area/product_images/<?php echo $product_image ?>"
                                    style="object-fit:contain;width:150px;height:150px" />
                            </td>
                            <td><input type="number" name="qty" class="form-input w-50 mt-4" /></td>
                            <?php   
                                   $get_ip_add = getIPAddress(); 
                                  if(isset($_POST['update_cart'])){ 
                                 $quanty=$_POST['qty'];
                                 $update_cart="UPDATE `cart_details` SET quantity='$quanty'
                                  WHERE ip_address='$get_ip_add' ";
                                  $resultng=mysqli_query($con,$update_cart);
                                  $total_price=$total_price*(int)$quanty;
                                  }
                                ?>
                            <td><?php echo $product_price ?></td>
                            <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>" /></td>
                            <td>
                                <button name="update_cart" class="bg-info px-3 py-2 border-0 mx-3">Update</button>
                                <button name="remove_cart" class="bg-info px-3 py-2 border-0 mx-3">Remove</button>
                            </td>
                        </tr>

                        <?php }}}
                            
                            else{
                                echo "<h2 class='text-center text-danger'>Cart is empty</h2>";
                            }?>

                        </tbody>
                    </table>
                    <div class="d-flex mb-5">
                        <?php
global $con;
$get_ip_add = getIPAddress(); 
$cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){
    echo"
    <h4 class='px-3'>Subtotal: <strong class='text-info'>$total_price</strong></h4>
                        <button><a href='index.php' style='color:white' class='bg-info p-1 px-2 border-0'>Continue
                                shopping</a></button>
                        <button class='bg-secondary text-light px-2 p-1 mx-1 border-0'
                                id='d1'><a style='color:white' href='./users_area/chekout.php'>Checkout</a></button>

                        ";
                        }
                        else{
                        echo" <button><a href='index.php' style='color:white' class='bg-info p-1 px-2 border-0'>Continue
                                shopping</a></button>";

                        }
                        ?>
                    </div>
            </div>
        </div>
        </form>
        <?php
        function remove_item(){
            global $con;
            if(isset($_POST['remove_cart'])){
      foreach($_POST['removeitem'] as $remove_id){
$del_query="DELETE FROM `cart_details` WHERE product_id='$remove_id'";
$run_dell=mysqli_query($con,$del_query);
 if($run_dell){
    echo "<script>window.open('cart.php','_self')</script>";
}}}}

 echo $remove_item=remove_item();

        ?>

        <div class="b-0">
            <?php
       include ('./includes/footer.php');
       ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>