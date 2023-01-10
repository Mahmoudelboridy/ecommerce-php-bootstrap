<?php
include ('../includes/connect.php');
session_start();

if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];

    $select_data="SELECT * FROM `user_orders` WHERE order_id=$order_id";
    $reuslt=mysqli_query($con,$select_data);
    $row=mysqli_fetch_assoc($reuslt);
    $invoice_number=$row['invoice_number'];
    $amount_due=$row['amount_due'];
   

}

if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_number'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $insert_query="INSERT INTO `user_payments`(order_id,
    invoice_number,amount,payment_mode,date) VALUES
     ('$order_id','$invoice_number','$amount',
     '$payment_mode',NOW())";
    $result=mysqli_query($con,$insert_query);
    if($result){
        echo "<script>alert('successfully completed the payment');</script>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_query="UPDATE `user_orders` SET order_status='complete' WHERE order_id='$order_id'";
    $resultn=mysqli_query($con,$update_query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body class="bg-secondary">
    <div class="container my-5">
        <h1 class="text-center text-light">Confirm Payment</h1>
        <form action="" method="POST">
            <div class="form-outline my-4 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" value="<?php echo $invoice_number  ?>"
                    name="invoice_number" />
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <h5 class="text-light">amount</h5>
                <input type="text" value="<?php echo $amount_due ; ?>" class="form-control w-50 m-auto" name="amount" />
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option>Select payment mode</option>
                    <option>UPI</option>
                    <option>Netbanking</option>
                    <option>Paypal</option>
                    <option>Cash on dlivery</option>
                    <option>pay offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <button class="bg-info py-2 px-3 border-0" name="confirm_payment">Confirm</button>
            </div>
        </form>
    </div>
</body>

</html>