<?php
if(isset($_GET['edit_category'])){
    $editid=$_GET['edit_category'];
    $getdata="SELECT * FROM `categories` WHERE category_id='$editid'";
    $result_query=mysqli_query($con,$getdata);
    $row=mysqli_fetch_assoc($result_query);
    $category_title=$row['category_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit category</h1>
    <form action="" method="POST">
        <div class="form-outline w-50 m-auto mb-4">
            category title
            <input type="text" value="<?php echo $category_title ?>" name="category_title" class="form-control"
                required="required" />
        </div>
        <div class="text-center">
            <button name="edit_category" class="btn btn-info px-3 mb-3">Update category</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_category'])){
    $edit_title=$_POST['category_title'];
    if($edit_title==''){
        echo "<script>alert('Please fill the available field')</script>";
    }else{
       $update="UPDATE `categories` SET category_title='$edit_title' WHERE category_id='$editid'";
       $qquery=mysqli_query($con,$update);
       if($qquery){
        echo "<script>alert('The category updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
     }
    }
    }