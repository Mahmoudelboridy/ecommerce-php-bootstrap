<?php if(isset($_GET['delete_brand'])){
    $delete_id=$_GET['delete_brand'] ;
$delete="DELETE FROM `brands` WHERE brand_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The brand deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}
?>