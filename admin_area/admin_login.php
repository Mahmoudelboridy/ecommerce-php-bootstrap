<?php
include ('../includes/connect.php');
include ('../functions/function.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-5">Admin login</h2>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-lg-6">
            <img src="00.jpg" class="img-fluid mx-4" />
        </div>
        <div class="col-lg-6 ">
            <form action="" method="POST">
                <div class="form-outline mx-5 mb-4">
                    username
                    <input class="form-control my-2" required="required" type="text" name="username"
                        placeholder="Enter u username" />
                </div>
                <div class="form-outline mx-5 mb-4">
                    password
                    <input class="form-control my-2" required="required" type="password" name="pass"
                        placeholder="Enter u password" />
                </div>
                <div class="text-center">
                    <button class="bg-info mb-3 py-2 px-3 border-0" name="login">Admin login</button>
                    <p class="small fw-bold" style="font-size:18pt;">don't have account? <a class="link-danger"
                            href="admin_register.php">register</a>
                    </p>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

<?php
if(isset($_POST['login'])){
$username=$_POST['username'];
$password=$_POST['pass'];

$selectt_query="SELECT * FROM `admin_table` 
WHERE admin_name='$username'";
$sqqql=mysqli_query($con,$selectt_query);
$rowswn=mysqli_num_rows($sqqql);
$row_data=mysqli_fetch_assoc($sqqql);
if($rowswn>0){
    $_SESSION['user']=$username;
if(password_verify($password,$row_data['admin_pass'])){
   // echo "<script>alert('login successful')</script>";
   echo "<script>alert('login successful')</script>";
   echo "<script>window.open('index.php','_self')</script>";
   
   }
else{
    echo "<script>alert('u password is not correct')</script>";
}
}
else{
    echo "<script>alert('u need to register')</script>";
}}
?>