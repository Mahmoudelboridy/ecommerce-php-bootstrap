<h3 class="text-center text-success">All categories</h3>
<table class="table table-bordered-mt-5">
    <thead class="bg-info text-center">
        <tr>
            <th>Si no</th>
            <th>Category title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
        $get_category="SELECT * FROM `categories`";
        $result=mysqli_query($con,$get_category);
        $num='0';
        while($row=mysqli_fetch_assoc($result)){
            $num++;
            $category_id=$row['category_id'];
            $category_title=$row['category_title'];
            ?>
        <tr class='text-center'>
            <td><?php echo $num ?></td>
            <td><?php echo $category_title ?></td>
            <td><a href='index.php?edit_category=<?php echo $category_id ?>' class='text-light'><i
                        class='fa-solid fa-pen-to-square'></a></td>
            <td><a href='index.php?delete_category=<?php echo $category_id ?>' class='text-light'><i
                        class='fa-solid fa-trash'></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>