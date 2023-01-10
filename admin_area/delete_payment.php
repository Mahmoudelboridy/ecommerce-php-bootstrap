<?php
if(isset($_GET['delete_payment'])){
    $delete_id=$_GET['delete_payment'] ;
$delete="DELETE FROM `user_payments` WHERE payment_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The payment deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}

?>