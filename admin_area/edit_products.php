<?php
if(isset($_GET['edit_products'])){
    $editid=$_GET['edit_products'];
    $getdata="SELECT * FROM `products` WHERE product_id='$editid'";
$result_query=mysqli_query($con,$getdata);
$row=mysqli_fetch_assoc($result_query);
$product_title=$row['product_title'];
$product_description=$row['product_description'];
$category_id=$row['category_id'];
$brand_id=$row['brand_id'];
$product_image1=$row['product_image1'];
$product_image2=$row['product_image2'];
$product_price=$row['product_price'];


//fetching category
$select_category="SELECT * FROM `categories` WHERE category_id='$category_id'";
$cate_result=mysqli_query($con,$select_category);
$row=mysqli_fetch_assoc($cate_result);
$category_title=$row['category_title'];
//fetching brands
$select_brand="SELECT * FROM `brands` WHERE brand_id ='$brand_id'";
$brand_result=mysqli_query($con,$select_brand);
$rown=mysqli_fetch_assoc($brand_result);
$brand_title=$rown['brand_title'];
}





?>



<style>
.product_image {
    width: 15%;
    height: 15%;
    object-fit: contain;
}
</style>
<div class="container mt-5">
    <h1 class="text-center">Edit products</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            product title
            <input type="text" value="<?php echo $product_title ?>" name="product_title" class="form-control"
                required="required" />
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product description
            <input value="<?php echo $product_description ?>" type="text" name="product_desc" class="form-control"
                required="required" />
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product category
            <select name="product_category" class="form-select">
                <option value="<?php echo $category_title ?>"><?php echo $category_title ?></option>
                <?php
                $selectn_category="SELECT * FROM `categories`";
                $categ_result=mysqli_query($con,$selectn_category);
                while($rownn=mysqli_fetch_assoc($categ_result)){
                $categoryn_title=$rownn['category_title'];
                $categoryn_id=$rownn['category_id'];
               echo "<option value='$categoryn_id'>$categoryn_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product brand
            <select name="product_brands" class="form-select">
                <option value="<?php echo $brand_title ?>"><?php echo $brand_title ?></option>
                <?php
                $selectn_brand="SELECT * FROM `brands`";
                $brandn_result=mysqli_query($con,$selectn_brand);
                while($rownln=mysqli_fetch_assoc($brandn_result)){
                $bbrand_title=$rownln['brand_title'];
                $bbrand_id=$rownln['brand_id'];
               echo "<option value='$bbrand_id'>$bbrand_title</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product image1
            <div class="d-flex">
                <input type="file" name="product_image1" class="form-control w-90 m-auto" required="required" />
                <img src="./product_images/<?php echo $product_image1  ?>" class="product_image" />
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product image2
            <div class="d-flex">
                <input type="file" name="product_image2" class="form-control w-90 m-auto" required="required" />
                <img src="./product_images/<?php echo $product_image2  ?>" class="product_image" />
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            product price
            <input value="<?php echo $product_price ?>" type="number" name="product_price" class="form-control"
                required="required" />
        </div>
        <div class="text-center">
            <button name="edit_product" class="btn btn-info px-3 mb-3">Update product</button>
        </div>
    </form>
</div>

<?php
if(isset($_POST['edit_product'])){
    $edit_title=$_POST['product_title'];
    $description=$_POST['product_desc'];
    $edit_product_categories=$_POST['product_category'];
    $edit_product_brands=$_POST['product_brands'];
    $edit_product_price=$_POST['product_price'];
    $edit_product_image1=$_FILES['product_image1']['name'];
    $edit_product_image2=$_FILES['product_image2']['name'];
    $edit_temp_image1=$_FILES['product_image1']['tmp_name'];
    $edit_temp_image2=$_FILES['product_image2']['tmp_name'];
    if($edit_title=='' or $description=='' or $edit_product_categories=='' or $edit_product_brands=='' or 
    $edit_product_price=='' or $edit_product_image1=='' or $edit_product_image2==''){
        echo "<script>alert('Please fill all the available fields')</script>";
    }else{
        move_uploaded_file($edit_temp_image1,"./product_images/$edit_product_image1");
        move_uploaded_file($edit_temp_image2,"./product_images/$edit_product_image2");
    $update="UPDATE `products` SET product_title='$edit_title',
     product_description='$description',
     category_id='$edit_product_categories',brand_id='$edit_product_brands',
     product_image1='$edit_product_image1',
     product_image2='$edit_product_image2',
     product_price='$edit_product_price',
     date=NOW() WHERE product_id='$editid'";
     $qquery=mysqli_query($con,$update);
     if($qquery){
        echo "<script>alert('The product updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
     }
    }




}


?>