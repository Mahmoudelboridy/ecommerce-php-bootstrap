<style>
.product_image {
    width: 15%;
    height: 15%;
    object-fit: contain;
}
</style>
<h3 class="text-center text-success">All products</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Si no</th>
            <th>Product title</th>
            <th>Product image</th>
            <th>Product price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_products="SELECT * FROM `products`";
        $result=mysqli_query($con,$get_products);
        $num='0';
        while($row=mysqli_fetch_assoc($result)){
            $num++;
            $product_id=$row['product_id'];
            $product_title=$row['product_title'];
            $product_image=$row['product_image1'];
            $product_price=$row['product_price'];
            $status=$row['status'];
            ?>
        <tr class='text-center'>
            <td><?php echo $num ?></td>
            <td><?php echo $product_title ?></td>
            <td><img class='product_image' src='./product_images/<?php echo $product_image ?>' /></td>
            <td><?php echo $product_price ?></td>
            <td><?php
            $get_count="SELECT * FROM `orders_pending` WHERE product_id='$product_id'";
            $result_count=mysqli_query($con,$get_count);
            $row_count=mysqli_num_rows($result_count);
            echo $row_count;
            ?></td>
            <td><?php echo $status ?></td>
            <td><a href='index.php?edit_products=<?php echo $product_id ?>' class='text-light'><i
                        class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_products=<?php echo $product_id ?>' class='text-light'><i
                        class='fa-solid fa-trash'></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>