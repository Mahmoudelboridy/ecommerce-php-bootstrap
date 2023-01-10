<?php
if(isset($_GET['delete_order'])){
    $delete_id=$_GET['delete_order'] ;
$delete="DELETE FROM `user_orders` WHERE order_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The order deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}

?>