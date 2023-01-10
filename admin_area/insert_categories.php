<?php
include('../includes/connect.php');
if(isset($_POST['insert_cat'])){
    $category_title=$_POST['cat_title'];


    $select_query="SELECT * FROM `categories` WHERE category_title='$category_title'";
    $result_select=mysqli_query($con,$select_query);
    $numvar=mysqli_num_rows($result_select);
    if($numvar>0){
        echo "<script>alert('This category is present inside the database');</script>";
 
    }
    else{
    $insert_query="INSERT INTO `categories`
    (category_title)
     VALUES ('$category_title')";
     $result=mysqli_query($con,$insert_query);
     if($result){
        echo "<script>alert('Category has been inserted sucessfully');</script>";
     }
}
}
?>
<h2 class="text-center">Insert categories</h2>
<form action="" method="Post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <input type="text" class="form-control" name="cat_title" placeholder="insert categories" aria-label="Username"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 ">
        <button style="width:30% ;" class="p-1 my-1 bg-info" name="insert_cat">insert category</button>
    </div>
</form>