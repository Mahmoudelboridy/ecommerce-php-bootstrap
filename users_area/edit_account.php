<?php
if(isset($_GET['edit_account'])){
    $user_session_name=$_SESSION['username'];
    $select_query="SELECT * FROM `user_table`
     WHERE username='$user_session_name'";
     $result_query=mysqli_query($con,$select_query);
     $row=mysqli_fetch_assoc($result_query);
     $usern_email=$row['user_email'];
     $usern_address=$row['user_address'];
     $usern_mobil=$row['use_mobil'];
     $usern_id=$row['user_id'];
}
     if(isset($_POST['user_update'])){
        $update_id=$usern_id ;
        $us_name=$_POST['user_username'];
        $us_email=$_POST['user_email'];
        $us_address=$_POST['user_address'];
        $us_mobil=$_POST['user_mobil'];
        $us_image=$_FILES['user_image']['name'];
        $us_temp=$_FILES['user_image']['tmp_name'];
        move_uploaded_file($us_temp,"./user_images/$us_image");


        $update="UPDATE `user_table` SET 
        username='$us_name',user_email='$us_email',
        user_image='$us_image',
        user_address='$us_address',
        use_mobil='$us_mobil' WHERE user_id='$update_id'";
        $result_update=mysqli_query($con,$update);
        if($result_update){
           echo "<script>alert('Data updated successfully');</script>";
           echo "<script>window.open('logout.php','_self');</script>";
        }
     }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit account active</title>
</head>

<body>
    <h3 class="text-center text-success mb-4">Edit account</h3>
    <form action="" method="POST" enctype="multipart/form-data" class="text-center">
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_session_name ; ?>" class="form-control w-50 m-auto"
                name="user_username" />
        </div>
        <div class="form-outline mb-4">
            <input type="email" value="<?php echo $usern_email ; ?>" class="form-control w-50 m-auto"
                name="user_email" />
        </div>
        <div class="form-outline mb-4 d-flex  w-50 m-auto">
            <input type="file" class="form-control m-auto" name="user_image" />
            <img src="./user_images/<?php echo $user_ima ;  ?>" class="i2" />
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo  $usern_address ; ?>" class="form-control w-50 m-auto"
                name="user_address" />
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo  $usern_mobil ; ?>" class="form-control w-50 m-auto"
                name="user_mobil" />
        </div>
        <button class="bg-info py-2 px-3 border-0" name="user_update">Update</button>
    </form>
</body>

</html>