<?php
if(isset($_GET['delete_user'])){
    $delete_id=$_GET['delete_user'] ;
$delete="DELETE FROM `user_table` WHERE user_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The user deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}

?>