<?php
include ('../includes/connect.php');
include ('../functions/function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        overflow-x: hidden;
    }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container fluid ">
                <img src="logo3.jpg" style="width:7%;height:7%;" />
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <?php
                            if(!isset($_SESSION['user'])){
                                echo " <li class='nav-item'>
                                <a class='nav-link' href=''>welcome admin</a>
                            </li>";
                               }else{
                                echo " <li class='nav-item'>
                                <a class='nav-link' href='./users_area/profile.php'>welcome ".$_SESSION['user']."</a>
                            </li>";
                               }
                               ?>

                    </ul>
                </nav>
            </div>
        </nav>
        <div class="bg-light">
            <h3 class="text-center p-2 ">Manage Details</h3>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-item-center">
                <div class="px-5">
                    <a href=""><img src="llogo.jpg" style="width:150px;height:120px"></a>
                    <?php
                            if(!isset($_SESSION['user'])){
                                echo "<p class='text-light text-center'>admin name</p>
                                ";
                               }else{
                                echo "<p class='text-light text-center'>".$_SESSION['user']."</p>
                                ";
                               }
                               ?>
                </div>
                <div class="button text-center  p-1">
                    <button class="my-3"><a href="insert_product.php"
                            class="nav-link text-light bg-info p-1 my-1">insert
                            products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info p-1 my-1">view
                            products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info p-1 my-1">insert
                            categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info p-1 my-1">view
                            categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info p-1 my-1">insert
                            brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info p-1 my-1">view
                            brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info p-1 my-1">all
                            orders</a></button>
                    <button><a href="index.php?list_payment" class="nav-link text-light bg-info p-1 my-1">all
                            payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info p-1 my-1">list
                            users</a></button>
                    <?php
                            if(!isset($_SESSION['user'])){
                                echo "<button><a href='' class='nav-link text-light bg-info p-1 my-1'>hellow</a></button>
                                ";
                               }else{
                                echo "<button><a href='admin_logout.php' class='nav-link text-light bg-info p-1 my-1'>logout</a></button>
                                ";
                               }
                               ?>
                </div>
            </div>
        </div>

        <div class="container my-4">
            <?php
          if(isset($_GET['insert_category'])){
            include ('insert_categories.php');
          }
          if(isset($_GET['insert_brand'])){
            include ('insert_brands.php');
          }
          if(isset($_GET['view_products'])){
            include ('view_products.php');
          }
          if(isset($_GET['edit_products'])){
            include ('edit_products.php');
          }
          if(isset($_GET['delete_products'])){
            include ('delete_product.php');
          }
          if(isset($_GET['view_categories'])){
            include ('view_categories.php');
          }
          if(isset($_GET['view_brands'])){
            include ('view_brands.php');

          }
          if(isset($_GET['edit_category'])){
            include ('edit_category.php');
          }
          if(isset($_GET['delete_category'])){
            include ('delete_category.php');
          }
          if(isset($_GET['edit_brand'])){
            include ('edit_brand.php');
          }
          if(isset($_GET['delete_brand'])){
            include ('delete_brand.php');
          }
          if(isset($_GET['list_orders'])){
            include ('list_orders.php');
          }
          if(isset($_GET['delete_order'])){
            include ('delete_order.php');
          }
          if(isset($_GET['list_payment'])){
            include ('list_payment.php');
          }
          if(isset($_GET['delete_payment'])){
            include ('delete_payment.php');
          }
          if(isset($_GET['list_users'])){
            include ('list_users.php');
          }
          if(isset($_GET['delete_user'])){
            include ('delete_user.php');
          }

            ?>
        </div>

    </div>
    <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

</body>
<?php
                if(!isset($_SESSION['user'])){
                 echo "<script>window.open('admin_login.php','_self')</script>";
                }
               
                ?>

</html>