<h3 class="text-center text-danger mt-3 mb-4">Delete account</h3>
<form action="" method="POST" class="mt-5">
    <div class="form-outline mb-4">
        <button class="form-control w-50 m-auto" name="delete">Delete account</button>
    </div>
    <div class="form-outline mb-4">
        <button class="form-control w-50 m-auto" name="dont_delete">Don't delete account</button>
    </div>
</form>

<?php

$user_name_session=$_SESSION['username'];
if(isset($_POST['delete'])){
    $delete_query="DELETE FROM `user_table` WHERE username='$user_name_session'";
    $result=mysqli_query($con,$delete_query);
    if($result){
        session_destroy();
        echo "<script>alert('Account deleted successfully')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}

if(isset($_POST['dont_delete'])){
    echo "<script>window.open('profile.php','_self')</script>";
}

?>