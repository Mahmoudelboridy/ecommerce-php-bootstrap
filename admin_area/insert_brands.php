<?php
include('../includes/connect.php');
if(isset($_POST['insert_brand'])){
    $brand_title=$_POST['brand_title'];
    $select_query="SELECT * FROM `brands` WHERE brand_title=' $brand_title'";
    $result_select=mysqli_query($con,$select_query);
    $numvar=mysqli_num_rows($result_select);
    if($numvar>0){
        echo "<script>alert('This brand is present inside the database');</script>";
 
    }
    else{
    $insert_query="INSERT INTO `brands`
    (brand_title)
     VALUES ('$brand_title')";
     $result=mysqli_query($con,$insert_query);
     if($result){
        echo "<script>alert('Brand has been inserted sucessfully');</script>";
     }
}
}
?>
<h2 class="text-center">Insert brands</h2>
<form action="" method="Post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <input type="text" class="form-control" name="brand_title" placeholder="insert brands" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">
        <button style="width:30% ;" class="p-1 my-1 bg-info" name="insert_brand">insert brand</button>
    </div>
</form>