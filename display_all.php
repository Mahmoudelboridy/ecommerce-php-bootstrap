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
    <title>ecommerce website</title>
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
                        <li class="nav-item">
                            <a class="nav-link" href="#">total price:<?php total_cart_price(); ?></php></a>
                        </li>
                    </ul>
                    <form class="d-flex" action="search_product.php" method="GET">
                        <input name="search_data" class="form-control me-2" type="search" placeholder="Search"
                            aria-label="Search">
                        <button name="search_data_product" class="btn btn-outline-light" value="search">Search</button>
                    </form>
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
        <div class="row px-1">
            <div class="col-md-10">
                <div class="row">
                    <?php
                  get_all_products();
                  get_unique_category();
                  get_unique_brand();
                    ?>


                </div>
            </div>
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light">
                            <h4>Delivery brands</h4>
                        </a>
                    </li>
                    <?php
                   getbrands();
                    ?>
                </ul>
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info">
                        <a href="" class="nav-link text-light">
                            <h4>Categories</h4>
                        </a>
                    </li>
                    <?php
                 getcategories();
                    ?>
                </ul>
            </div>

        </div>
        <?php
        include ('./includes/footer.php');
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>