<?php
include ('../includes/connect.php');
include ('../functions/function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">User login</h2>
        <div class="row mt-5 d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="POST">
                    <div class="form-outline mb-4">
                        <label class="mb-1">user name</label> <input type="text" class="form-control"
                            placeholder="Enter u username"  required="required"
                            name="user_username" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="mb-1">password</label> <input type="password" class="form-control"
                            placeholder="Enter u password"  required="required"
                            name="user_password" />
                    </div>
                    <div class="text-center">
                        <button class="bg-info mb-3 py-2 px-3 border-0" name="user_login">login</button>
                        <p class="fw-bold mb-0" style="font-size:18pt;">Don't have an account? <a
                                href="user_registration.php">register</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

<?php
if(isset($_POST['user_login'])){
$user_username=$_POST['user_username'];
$user_password=$_POST['user_password'];

$selectt_query="SELECT * FROM `user_table` 
WHERE username='$user_username'";
$sqqql=mysqli_query($con,$selectt_query);
$rowswn=mysqli_num_rows($sqqql);
$row_data=mysqli_fetch_assoc($sqqql);
$user_ip= getIPAddress();



$selectot_query="SELECT * FROM `cart_details` 
WHERE ip_address='$user_ip'";
$selevt_cart=mysqli_query($con,$selectot_query);
$row_cart=mysqli_num_rows($selevt_cart);
if($rowswn>0){
    $_SESSION['username']=$user_username;
if(password_verify($user_password,$row_data['user_password'])){
   // echo "<script>alert('login successful')</script>";
   if ($rowswn==1 AND $row_cart==0){
    $_SESSION['username']=$user_username;
   echo "<script>alert('login successful')</script>";
   echo "<script>window.open('profile.php','_self')</script>";
   }
   else{
    $_SESSION['username']=$user_username;
    echo "<script>alert('login successful')</script>";
    echo "<script>window.open('payment.php','_self')</script>";
 
   }
}else{
    echo "<script>alert('u password is not correct')</script>";
}
}
else{
    echo "<script>alert('u need to register')</script>";
}
}
?>