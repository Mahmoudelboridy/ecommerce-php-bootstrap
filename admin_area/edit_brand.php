<?php
if(isset($_GET['edit_brand'])){
$editid=$_GET['edit_brand'];
$getdata="SELECT * FROM `brands` WHERE brand_id='$editid'";
$result_query=mysqli_query($con,$getdata);
    $row=mysqli_fetch_assoc($result_query);
    $brand_title=$row['brand_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit brand</h1>
    <form action="" method="POST">
        <div class="form-outline w-50 m-auto mb-4">
            brand title
            <input type="text" value="<?php echo $brand_title ?>" name="brand_title" class="form-control"
                required="required" />
        </div>
        <div class="text-center">
            <button name="edit_brand" class="btn btn-info px-3 mb-3">Update brand</button>
        </div>
    </form>
</div>
<?php
if(isset($_POST['edit_brand'])){
    $edit_title=$_POST['brand_title'];
    if($edit_title==''){
        echo "<script>alert('Please fill the available field')</script>";
    }else{
       $update="UPDATE `brands` SET brand_title='$edit_title' WHERE brand_id='$editid'";
       $qquery=mysqli_query($con,$update);
       if($qquery){
        echo "<script>alert('The brand updated successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    
     }
    }
    }
    ?>