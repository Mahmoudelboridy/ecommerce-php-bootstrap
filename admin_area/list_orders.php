<h3 class="text-center text-success">All orders</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Si no</th>
            <th>Due amount</th>
            <th>Invoice number</th>
            <th>Total products</th>
            <th>Order date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-center text-light">
        <?php
$get_orders="SELECT * FROM `user_orders`";
$result=mysqli_query($con,$get_orders);
$row=mysqli_num_rows($result);
$num=0 ;
if($row=='0'){
    echo "<h2 class='text-danger text-center mt-5'>No orders yet</h2>";
}
else{
    while($rown=mysqli_fetch_assoc($result)){
        $num++;
        $amount_due=$rown['amount_due'];
        $invoice_number=$rown['invoice_number'];
        $total_products=$rown['total_products'];
        $order_date=$rown['order_date'];
        $order_status=$rown['order_status'];
    $order_id=$rown['order_id'];

?>

        <tr>
            <td><?php echo $num ?></td>
            <td><?php echo $amount_due ?></td>
            <td><?php echo $invoice_number ?></td>
            <td><?php echo $total_products ?></td>
            <td><?php echo $order_date ?></td>
            <td><?php echo $order_status ?></td>
            <td><a href='index.php?delete_order=<?php echo $order_id ?>' class='text-light'><i
                        class='fa-solid fa-trash'></a></td>
        </tr>
        <?php
        }}
        ?>
    </tbody>
</table>