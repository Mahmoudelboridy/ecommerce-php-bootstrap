<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>all my orders</title>
</head>

<body>
    <?php
$username=$_SESSION['username'];
$get_users="SELECT * FROM `user_table` WHERE username='$username'";
$result=mysqli_query($con,$get_users);
$row=mysqli_fetch_assoc($result);
$user_id=$row['user_id'];

?>
    <h3 class="text-success text-center">All my orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>si no</th>
                <th>amount due</th>
                <th>total products</th>
                <th>invoice number</th>
                <th>Date</th>
                <th>complete/incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-secondary text-light">
            <?php
     $get_order_details="SELECT * FROM `user_orders` WHERE user_id='$user_id'";
        $querry=mysqli_query($con,$get_order_details);
        $serial_n=1;
        while($rown=mysqli_fetch_assoc($querry)){
               $oid=$rown['order_id'];
               $amount=$rown['amount_due'];
               $total_products=$rown['total_products'];
               $invoice=$rown['invoice_number'];
               $order_status=$rown['order_status'];
               if($order_status=='pending'){
                $order_status="Incomplete";
               }
               else{
                $order_status="complete";
               }
               $order_date=$rown['order_date'];
               $serial_n+'1';
             echo "
             <tr>
             <td>$serial_n</td>
             <td>$amount</td>
             <td>$total_products</td>
             <td>$invoice</td>
             <td>$order_date</td>
             <td>$order_status</td>";
             ?>
            <?php
          if($order_status=='complete'){
            echo "<td>Paid</td>";
          }else{
             echo "<td><a href='confirm_payment.php?order_id=$oid' class='text-light'>Confirm</a></td>
         </tr>";}
        $serial_n++ ;

        }
        ?>

        </tbody>
    </table>
</body>

</html>