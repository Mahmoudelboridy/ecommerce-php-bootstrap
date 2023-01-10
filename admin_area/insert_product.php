<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
$product_title=$_POST['product_title'];
$description=$_POST['description'];
$product_categories=$_POST['product_categories'];
$product_brands=$_POST['product_brands'];
$product_price=$_POST['product_price'];
$product_image1=$_FILES['product_image1']['name'];
$product_image2=$_FILES['product_image2']['name'];
$temp_image1=$_FILES['product_image1']['tmp_name'];
$temp_image2=$_FILES['product_image2']['tmp_name'];
$product_status="true";

if($product_title=='' or $description=='' or $product_categories=='' or $product_brands=='' or 
$product_price=='' or $product_image1=='' or $product_image2==''){
    echo "<script>alert('Please fill all the available fields')</script>";
    exit();
}else{
    move_uploaded_file($temp_image1,"./product_images/$product_image1");
    move_uploaded_file($temp_image2,"./product_images/$product_image2");
  $insert_products="INSERT INTO `products` (product_title,product_description,category_id,brand_id,product_image1,product_image2,product_price,date,status)
   VALUES ('$product_title','$description','$product_categories',
   '$product_brands','$product_image1','$product_image2','$product_price',
   NOW(),'$product_status')";
   $result_query=mysqli_query($con,$insert_products);
   if($result_query){
    echo "<script>alert('Successfully inserted the product')</script>";
    echo "<script>window.open('index.php','_self')</script>";
   }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert products-admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    * {
        font-size: 17pt;
    }
    </style>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert products</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-outline mb-4  ">
                product title <input placeholder="enter product title" type="text" name="product_title"
                    autocomplete="off" required="requird" class="form-control" />
            </div>
            <div class="form-outline mb-4">
                product description <input placeholder="enter product description" style="height:120px;" type="text"
                    class="form-control" name="description" autocomplete="off" required="requird" />
            </div>
            <div class="form-outline mb-4">
                <select class="form-select" name="product_categories">
                    <option value="">select a category</option>
                    <?php
                $select_query="SELECT * FROM `categories`";
                $result_query=mysqli_query($con,$select_query);
                while($row=mysqli_fetch_assoc($result_query)){
                 $category_title=$row['category_title'];
                 $category_id=$row['category_id'];
                 echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-outline mb-4">
                <select class="form-select" name="product_brands">
                    <option value="">select a brand</option>
                    <?php
                $select_query2="SELECT * FROM `brands`";
                $result_query2=mysqli_query($con,$select_query2);
                while($row2=mysqli_fetch_assoc($result_query2)){
                 $brand_title=$row2['brand_title'];
                 $brand_id=$row2['brand_id'];
                 echo "<option value='$brand_id'>$brand_title</option>";
                }
                ?>
                </select>
            </div>
            <div class="form-outline mb-4">
                product image1
                <input class="form-control" type="file" accept="image/png, image/jpeg,image/jpg"
                    name="product_image1" />
            </div>
            <div class="form-outline mb-4">
                product image2
                <input class="form-control" type="file" accept="image/png, image/jpeg,image/jpg"
                    name="product_image2" />
            </div>
            <div class="form-outline mb-4">
                product price <input class="form-control" type="number" name="product_price" autocomplete="off"
                    required="requird" />
            </div>
            <div class="form-outline mb-4 text-center">
                <button class="btn btn-info " name="insert_product">Insert products</button>
            </div>

        </form>
    </div>

</body>

</html>