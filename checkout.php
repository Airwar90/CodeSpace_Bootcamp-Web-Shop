<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MK Time</title>
</head>
<body>
<?php 
include ('includes/nav.php');
if (isset($_GET['total'])&&($_GET['total'] > 0) && (!empty($_SESSION['cart'])))
{
    require('connect_db.php');

    $q = "INSERT INTO orders ( user_id, total, order_date ) VALUES (". $_SESSION['user_id'].",".$_GET['total'].", NOW() ) ";
	$r = mysqli_query ($link, $q);
	
    
    $order_id = mysqli_insert_id($link) ;
	 
     $q = "SELECT * FROM products WHERE product_id IN (";
		foreach ($_SESSION['cart'] as $id => $value) { $q .= $id.','; }
	 $q = substr( $q, 0, -1 ).') ORDER BY product_id ASC';
     $r = mysqli_query ($link, $q);
		  
		while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC))
  {
    $query = "INSERT INTO order_contents ( order_id, product_id, quantity, price )
    VALUES ( $order_id, ".$row['product_id'].",".$_SESSION['cart'][$row['product_id']]['quantity'].",".$_SESSION['cart'][$row['product_id']]['price'].")" ;
    $result = mysqli_query($link,$query);
  }
      
       mysqli_close($link);

      echo "<p> Thanks for your order. Your order number is #".$order_id."</p>";
      $_SESSION['cart'] = NULL;
}
else {echo '<p> There are no items in your cart</p>';}

?>
</body>
</html>