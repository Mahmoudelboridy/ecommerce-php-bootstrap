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
    <title>payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
img {
    width: 50%;
    display: block;
    margin: auto;
}
</style>

<body>
    <?php
    $user_ip=getIPAddress();
    $get_user="SELECT * FROM `user_table` WHERE user_ip='$user_ip'";
    $result=mysqli_query($con,$get_user);
    $run_query=mysqli_fetch_array($result);
    $user_id=$run_query['user_id'];
    ?>
    <div class="container">
        <h2 class="text-center text-info">Payment options</h2>
        <div class="row d-flex justify-content-center my-5 align-items-center">
            <div class="col-md-6">
                <a href="https://www.paypal.com/eg/home" target="_blank"><img src="p.jpg" /></a>
            </div>
            <div class="col-md-6">
                <a href="order.php?user_id=<?php echo $user_id ; ?>">
                    <h2 class="text-center">pay offline</h2>
                </a>
            </div>
        </div>
    </div>
</body>

</html>