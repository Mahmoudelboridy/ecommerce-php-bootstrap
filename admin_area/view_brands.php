<h3 class="text-center text-success">All brands</h3>

<table class="table table-bordered-mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Si no</th>
            <th>brand title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_brand="SELECT * FROM `brands`";
        $result=mysqli_query($con,$get_brand);
        $num='0';
        while($row=mysqli_fetch_assoc($result)){
            $num++;
            $brand_id=$row['brand_id'];
            $brand_title=$row['brand_title'];
            ?>
        <tr class='text-center'>
            <td><?php echo $num ?></td>
            <td><?php echo $brand_title ?></td>
            <td><a href='index.php?edit_brand=<?php echo $brand_id ?>' class='text-light'><i
                        class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_brand=<?php echo $brand_id ?>' class='text-light'><i
                        class='fa-solid fa-trash'></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>