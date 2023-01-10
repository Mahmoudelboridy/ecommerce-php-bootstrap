<?php if(isset($_GET['delete_products'])){
    $delete_id=$_GET['delete_products'] ;
$delete="DELETE FROM `products` WHERE product_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The product deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}
?>