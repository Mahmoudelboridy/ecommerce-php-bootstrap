<?php
include ('../includes/connect.php');
include ('../functions/function.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">New user registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-outline mb-4">
                        <label class="mb-1">user name</label> <input type="text" class="form-control"
                            placeholder="Enter u username" autocomplete="off" required="required"
                            name="user_username" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">user email</label> <input type="email" class="form-control"
                            placeholder="Enter u email" autocomplete="off" required="required" name="user_email" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">user image</label> <input type="file" class="form-control"
                            required="required" name="user_image" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">password</label> <input type="password" class="form-control"
                            placeholder="Enter u password" autocomplete="off" required="required"
                            name="user_password" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">confirm password</label> <input type="password" class="form-control"
                            placeholder="confirm password" autocomplete="off" required="required"
                            name="conf_user_password" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">address</label> <input type="text" class="form-control"
                            placeholder="Enter u address" autocomplete="off" required="required" name="user_address" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">contact</label> <input type="text" class="form-control"
                            placeholder="Enter u mobil number" autocomplete="off" required="required"
                            name="user_contact" />
                    </div>
                    <div class="text-center">
                        <button class="bg-info mb-3 py-2 px-3 border-0" name="user_register">register</button>
                        <p class="fw-bold mb-0" style="font-size:18pt;">already have account? <a
                                href="user_login.php">login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['user_register'])){
$user_username=$_POST['user_username'];
$user_email=$_POST['user_email'];
$user_password=$_POST['user_password'];
$hash_password=password_hash($user_password,PASSWORD_DEFAULT);
$conf_user_password=$_POST['conf_user_password'];
$user_address=$_POST['user_address'];
$user_contact=$_POST['user_contact'];
$user_image=$_FILES['user_image']['name'];
$user_image_temp=$_FILES['user_image']['tmp_name'];
$user_ip=getIPAddress();


$select_query="SELECT * FROM `user_table` 
WHERE username='$user_username' OR user_email='$user_email'";
$result=mysqli_query($con,$select_query);
$rows_count=mysqli_num_rows($result);
if($rows_count>0){
    echo "<script>alert('Username and Email is already exist');</script>";
}
elseif($user_password!=$conf_user_password){
  echo "<script>alert('Passwords do not match');</script>";
}
else{
$folder='user_images/'.$user_image ;
move_uploaded_file($user_image_temp,$folder);
$insert_query="INSERT INTO `user_table`(username,
user_email,user_password,user_image,user_ip,user_address,
use_mobil) VALUES ('$user_username','$user_email','$hash_password',
   '$user_image','$user_ip','$user_address','$user_contact')";
   $sql_execute=mysqli_query($con,$insert_query);

   if($sql_execute){
   echo "<script>alert('register successfully');</script>";
}else
   {
    echo "no";
   }
}


$select_cart_items="SELECT * FROM `cart_details` 
WHERE ip_address='$user_ip'";
$resultn=mysqli_query($con,$select_cart_items);
$rown_count=mysqli_num_rows($resultn);
if($rown_count>0){
    $_SESSION['username']=$user_username;
echo "<script>alert('you have items in u cart');</script>";
echo "<script>window.open('chekout.php','_self');</script>";
}
else{
    echo "<script>window.open('../index.php','_self');</script>";

}
}
?>