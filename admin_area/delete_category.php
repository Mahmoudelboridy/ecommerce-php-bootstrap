<?php if(isset($_GET['delete_category'])){
    $delete_id=$_GET['delete_category'] ;
$delete="DELETE FROM `categories` WHERE category_id='$delete_id'";
$delete_resulte=mysqli_query($con,$delete);
if($delete_resulte){
echo "<script>alert('The category deleted successfully')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}
?>