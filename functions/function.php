<?php
//include ('./includes/connect.php');

function getproducts(){
  global $con;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    $select3_query="SELECT * FROM `products` ORDER BY RAND() LIMIT 0,5";
    $resultn=mysqli_query($con,$select3_query);
    while($rown=mysqli_fetch_assoc($resultn)){
        $product_id=$rown['product_id'];
        $product_title=$rown['product_title'];
        $description=$rown['product_description'];
        $product_image1=$rown['product_image1'];
        $product_image2=$rown['product_image2'];
        $product_price=$rown['product_price'];
        $category_id=$rown['category_id'];
        $brand_id=$rown['brand_id'];
        echo "  <div class='col-md-4 mb-2'>
        <div class='card'>
            <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
            <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$description</p>
                <p class='card-text text-center'>$product_price : السعر</p>
                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>add to cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>

            </div>
        </div>
    </div>";
    }
}
}
}

function get_all_products(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
      $select3_query="SELECT * FROM `products` ORDER BY RAND()";
      $resultn=mysqli_query($con,$select3_query);
      while($rown=mysqli_fetch_assoc($resultn)){
          $product_id=$rown['product_id'];
          $product_title=$rown['product_title'];
          $description=$rown['product_description'];
          $product_image1=$rown['product_image1'];
          $product_image2=$rown['product_image2'];
          $product_price=$rown['product_price'];
          $category_id=$rown['category_id'];
          $brand_id=$rown['brand_id'];
          echo "  <div class='col-md-4 mb-2'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$description</p>
                  <p class='card-text text-center'>$product_price : السعر</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
  
              </div>
          </div>
      </div>";
      }
  }
  }
  }

function get_unique_category(){
    global $con;
    if(isset($_GET['category'])){
    $category_id=$_GET['category'];
      $select3_query="SELECT * FROM `products` WHERE category_id=$category_id";
      $resultn=mysqli_query($con,$select3_query);
      $num=mysqli_num_rows($resultn);
      if($num==0){
        echo "<h2 class='text-center text-danger'>No stock for this category</h2>";
      }
      while($rown=mysqli_fetch_assoc($resultn)){
          $product_id=$rown['product_id'];
          $product_title=$rown['product_title'];
          $description=$rown['product_description'];
          $product_image1=$rown['product_image1'];
          $product_image2=$rown['product_image2'];
          $product_price=$rown['product_price'];
          $category_id=$rown['category_id'];
          $brand_id=$rown['brand_id'];
          echo "  <div class='col-md-4 mb-2'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$description</p>
                  <p class='card-text text-center'>$product_price : السعر</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>add to cart</a>
                  <a href='#' class='btn btn-secondary'>view more</a>
  
              </div>
          </div>
      </div>";
      }
  }
  }

  function get_unique_brand(){
    global $con;
    if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
      $select3_query="SELECT * FROM `products` WHERE brand_id=$brand_id";
      $resultn=mysqli_query($con,$select3_query);
      $num=mysqli_num_rows($resultn);
      if($num==0){
        echo "<h2 class='text-center text-danger'>This brand is not availble for service</h2>";
      }
      while($rown=mysqli_fetch_assoc($resultn)){
          $product_id=$rown['product_id'];
          $product_title=$rown['product_title'];
          $description=$rown['product_description'];
          $product_image1=$rown['product_image1'];
          $product_image2=$rown['product_image2'];
          $product_price=$rown['product_price'];
          $category_id=$rown['category_id'];
          $brand_id=$rown['brand_id'];
          echo "  <div class='col-md-4 mb-2'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$description</p>
                  <p class='card-text text-center'>$product_price : السعر</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>add to cart</a>
                  <a href='#' class='btn btn-secondary'>view more</a>
  
              </div>
          </div>
      </div>";
      }
  }
  }

function getbrands(){

    global $con;

    $select_brands="SELECT * FROM `brands`";
    $result_brands=mysqli_query($con,$select_brands);
    while($row_data=mysqli_fetch_assoc($result_brands)){
        $brand_title=$row_data['brand_title'];
        $brand_id=$row_data['brand_id'];
        echo " <li class='nav-item'>
        <a href='index.php?brand=$brand_id' class='nav-link text-light'>
        $brand_title
        </a>
    </li>" ;
    }
}

function getcategories(){
    global $con;

    $select_categories="SELECT * FROM `categories`";
    $result_categories=mysqli_query($con,$select_categories);

    while($row_data=mysqli_fetch_assoc($result_categories)){
        $category_title=$row_data['category_title'];
        $category_id=$row_data['category_id'];
        echo " <li class='nav-item'>
        <a href='index.php?category=$category_id' class='nav-link text-light'>
        $category_title
        </a>
    </li>" ;
    }
}

function search_product(){
    global $con;
   if(isset($_GET['search_data_product'])){
    $search_data_value=$_GET['search_data'];
      $search_query="SELECT * FROM `products` WHERE product_title LIKE '%$search_data_value%'";
      $resultn=mysqli_query($con,$search_query);
      $num=mysqli_num_rows($resultn);
      if($num==0){
        echo "<h2 class='text-center text-danger'>No results match.no products found on this search</h2>";
      }
      while($rown=mysqli_fetch_assoc($resultn)){
          $product_id=$rown['product_id'];
          $product_title=$rown['product_title'];
          $description=$rown['product_description'];
          $product_image1=$rown['product_image1'];
          $product_image2=$rown['product_image2'];
          $product_price=$rown['product_price'];
          $category_id=$rown['category_id'];
          $brand_id=$rown['brand_id'];
          echo "  <div class='col-md-4 mb-2'>
          <div class='card'>
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$description</p>
                  <p class='card-text text-center'>$product_price : السعر</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>add to cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
                  </div>
          </div>
      </div>";
      }
}
}

function view_details(){
    global $con;
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
      $select3_query="SELECT * FROM `products` WHERE product_id='$product_id'";
      $resultn=mysqli_query($con,$select3_query);
      while($rown=mysqli_fetch_assoc($resultn)){
          $product_id=$rown['product_id'];
          $product_title=$rown['product_title'];
          $description=$rown['product_description'];
          $product_image1=$rown['product_image1'];
          $product_image2=$rown['product_image2'];
          $product_price=$rown['product_price'];
          $category_id=$rown['category_id'];
          $brand_id=$rown['brand_id'];
          echo " 
          <h1 class='text-center'>$product_title</h1><br><br><br>
          <h2 class='text-center'>$description</h2>
          <h3 class='text-center'>$product_price:السعر</h3>
          <img src='./admin_area/product_images/$product_image1' style='width:400px;height:400px;margin-top:50px;margin-left:100px;margin-top:50px;object-fit: contain;' />
          <img src='./admin_area/product_images/$product_image2' style='width:400px;height:400px;margin-top:50px;margin-left:450px;object-fit: contain;'/>
          <a href='index.php?add_to_cart=$product_id' style='width:50%;margin-left:auto;margin-right:auto;margin-top:20px' class='btn btn-info'>add to cart</a>
                    ";
      }
  }
  }
}
}


function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
//$ip = getIPAddress();  
//echo 'User Real IP Address - '.$ip; 
function cart(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $get_product_id=$_GET['add_to_cart'];
        $select_query="SELECT * FROM `cart_details` where
         ip_address='$get_ip_add' AND product_id=$get_product_id";
             $result=mysqli_query($con,$select_query);
             $num=mysqli_num_rows($result);
      if($num>0){
        echo "<script>alert('This item is already present inside the cart');</script>";
        echo "<script>window.open('index.php','_self');</script>";
      }
      else{
        $insert_query="INSERT INTO `cart_details`(product_id,ip_address,quantity) 
        VALUES ($get_product_id,'$get_ip_add',0)";
        $result=mysqli_query($con,$insert_query);
        echo "<script>alert('Item is added to cart');</script>";
        echo "<script>window.open('index.php','_self');</script>";

      }

    }
} 

function cart_item_num(){
    if(isset($_GET['add_to_cart'])){
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="SELECT * FROM `cart_details` where
         ip_address='$get_ip_add'";
             $result=mysqli_query($con,$select_query);
             $count_cart_item=mysqli_num_rows($result);}
      else{
        global $con;
        $get_ip_add = getIPAddress(); 
        $select_query="SELECT * FROM `cart_details` where
         ip_address='$get_ip_add'";
             $result=mysqli_query($con,$select_query);
             $count_cart_item=mysqli_num_rows($result);
      }
      echo $count_cart_item ;
    }

    function total_cart_price(){
        global $con;
        $get_ip_add = getIPAddress(); 
        $total_price=0;
$cart_query="SELECT * FROM `cart_details` WHERE ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
while($row=mysqli_fetch_array($result)){
    $product_id=$row['product_id'];
    $select_products="SELECT * FROM `products`
     WHERE product_id='$product_id'";
     $resultnn=mysqli_query($con,$select_products);
     while($row_product=mysqli_fetch_array($resultnn)){
$productn_price=array($row_product['product_price']);
$productn_values=array_sum($productn_price);
$total_price+=$productn_values;
     }
}
echo  $total_price ;
    }

function get_user_order_details(){
    global $con;
    $username=$_SESSION['username'];
    $getn_details="SELECT * FROM `user_table` 
    WHERE username='$username'";
$resultn_query=mysqli_query($con,$getn_details);
 while($row_query=mysqli_fetch_assoc($resultn_query)){
    $user_id=$row_query['user_id'];
    if(!isset($_GET['edit_account'])){
    if(!isset($_GET['my_orders'])){
    if(!isset($_GET['delete_account'])){
      $get_orders="SELECT * FROM `user_orders` 
      WHERE user_id='$user_id' and order_status='pending'";  
$result_orders_query=mysqli_query($con,$get_orders);
$row=mysqli_num_rows($result_orders_query);
if($row>0){
    echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row</span> pending orders</h3>
    <p class='text-center'><a class='text-dark' href='profile.php?my_orders'>Order details</a></p>";
}else{
    echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>
    <p class='text-center'><a class='text-dark' href='../index.php'>Explore products</a></p>";
 
}
    
}
 }
}}}

?>