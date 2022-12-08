<?php
include('includes/nav.php');
require('connect_db.php');
if (isset($_GET['id'])) $id = $_GET['id'];
$q = "SELECT * FROM products WHERE product_id='$id'";
$r = mysqli_query($link, $q);
if (mysqli_num_rows($r) == 1) {
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    if(isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
        echo '<section class="vh-50 gradient-custom">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
            
                    <p>Another '.$row["product_name"].' has been added to your cart</p>
                    <div class="col-sm">
          <div class="card" style="width: 18rem;">
          <img src ="'.$row['product_img'].'"class = "card-img-top alt = "'.$row['product_desc'].'">
          <div class="card-body">
          <h5 class="card-title">'.$row['product_name'].'</h5><p class="card-text">&pound'.$row['product_price'].'</p></div></div></div>
          <div>
            <a href = "home.php" class = "btn btn-dark">Continue Shopping</a> <a href = "cart.php" class = "btn btn-dark">Got to Cart</a>
        </div>          
          </div>
                    </div>
                  </div>
                </div>
              </div>
            </section>';}
    else {
        $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['product_price'] ) ;
    echo '
    <section class="vh-50 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
        
                <p>'.$row["product_name"].' has been added to your cart</p>
                <div class="col-sm">
      <div class="card" style="width: 18rem;">
      <img src ="'.$row['product_img'].'"class = "card-img-top alt = "'.$row['product_desc'].'">
      <div class="card-body">
      <h5 class="card-title">'.$row['product_name'].'</h5><p class="card-text">&pound'.$row['product_price'].'</p></div></div></div>
        <div>
            <a href = "home.php" class = "btn btn-dark">Continue Shopping</a> <a href = "cart.php" class = "btn btn-dark">Got to Cart</a>
        </div>
      
                </div>
                </div>
              </div>
            </div>
          </div>
        </section>       
    ';

    }

}
mysqli_close($link);  
?>