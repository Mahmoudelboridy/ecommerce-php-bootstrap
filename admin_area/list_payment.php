<h3 class="text-center text-success">All payment</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Si no</th>
            <th>Invoice number</th>
            <th>amount</th>
            <th>payment mode</th>
            <th>Order date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-center text-light">
        <?php
$get_payment="SELECT * FROM `user_payments`";
$result=mysqli_query($con,$get_payment);
$row=mysqli_num_rows($result);
$num=0 ;
if($row=='0'){
    echo "<h2 class='text-danger text-center mt-5'>No payments yet</h2>";
}
else{
    while($rown=mysqli_fetch_assoc($result)){
        $num++;
$amount=$rown['amount'];
$invoice_number=$rown['invoice_number'];
$payment_mode=$rown['payment_mode'];
$date=$rown['date'];
$payment_id=$rown['payment_id'];
?>
        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $amount ?></td>
            <td><?php echo $payment_mode ?></td>
            <td><?php echo $date ?></td>
            <td><a href='index.php?delete_payment=<?php echo $payment_id ?>' class='text-light'><i
                        class='fa-solid fa-trash'></a></td>
        </tr>
        <?php
        }}
        ?>
    </tbody>
</table>