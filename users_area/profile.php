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
    <title>welcome <?php echo $_SESSION['username'] ; ?></title>
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

    body {
        overflow-x: hidden;
    }

    .i1 {
        width: 90%;
        display: block;
        margin: auto;
        height: 75%;
    }

    .i2 {
        width: 190px;
        display: block;
        margin: auto;
        height: 190px;
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
                            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../display_all.php">products</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">profile</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="#">contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../cart.php"><i
                                    class="fa-solid fa-cart-shopping"></i><sup><?php cart_item_num(); ?></sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">total price:<?php total_cart_price(); ?></php></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="../search_product.php" method="GET">
                        <input name="search_data" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button name="search_data_product" class="btn btn-outline-light" value="search">Search</button>
                    </form>
                </div>
            </div>
        </nav>
        <?php
cart();
?>

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
                <a class='nav-link' href='user_login.php'>login</a>
            </li>";
               }else{
                echo "<li class=''nav-item'>
                <a class='nav-link' href='logout.php'>logout</a>
            </li>";
               }
                ?>
            </ul>
        </nav>
        <div class="bg-light">
            <h3 class="text-center">hidden store</h3>
            <p class="text-center">communications is at the heart of e-commerce and community</p>
        </div>

        <div class="row">
            <div class="col-md-2">
                <ul style="height:100vh" class="navbar-nav bg-secondary text-center">
                    <li class="nav-item bg-info">
                        <a class="nav-link text-light" href="#">
                            <h4>Your profile</h4>
                        </a>
                    </li>
                    <?php
                    $username=$_SESSION['username'];
                    $user_image="SELECT * FROM `user_table`
                     WHERE username='$username'";
                     $result_image=mysqli_query($con,$user_image);
                     $row=mysqli_fetch_assoc($result_image);
                     $user_ima= $row['user_image'];
                     echo " <li class='nav-item '>
                     <img src='./user_images/$user_ima' class='my-4 i1' />
                     </a>
                 </li>";
                    ?>

                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php">
                            <h6>Pending orders</h6>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?edit_account">
                            <h6>Edit account</h6>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?my_orders">
                            <h6>My orders</h6>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="profile.php?delete_account">
                            <h6>Delete account</h6>
                        </a>
                    </li>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-light" href="logout.php">
                            <h6>Logout</h6>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php
          get_user_order_details();
          if(isset($_GET['edit_account'])){
            include ('edit_account.php');
          }
          if(isset($_GET['my_orders'])){
            include ('user_orders.php');
          }
          if(isset($_GET['delete_account'])){
            include ('delete_account.php');
          }
           ?>

            </div>

        </div>

    </div>
    <?php
       include ('../includes/footer.php');
       ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>