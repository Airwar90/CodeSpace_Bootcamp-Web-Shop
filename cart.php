<?php 
include('includes/nav.php');
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ){
    foreach ( $_POST['qty'] as $item_id => $item_qty )
  { $id = (int) $item_id;
    $qty = (int) $item_qty;
    if ( $qty == 0 ) { unset ($_SESSION['cart'][$id]); } 
    elseif ( $qty > 0 ) { $_SESSION['cart'][$id]['quantity'] = $qty; }
  }
}
$total = 0;
if (!empty($_SESSION['cart']))
{
    require ('connect_db.php');
    $q = "SELECT * FROM products WHERE product_id IN (";
    foreach ($_SESSION['cart'] as $id => $value) { $q .= $id . ','; }
    $q = substr( $q, 0, -1 ) . ') ORDER BY product_id ASC';
    $r = mysqli_query ($link, $q);
    
    while ($row = mysqli_fetch_array ($r, MYSQLI_ASSOC)) {
        $subtotal=$_SESSION['cart'][$row['product_id']]['quantity'] * $_SESSION['cart'][$row['product_id']]['price'];
        $total += $subtotal;
        echo "<tr>  
<td> {$row['product_name']} </td> 
<td> <input type= \"text\" size=\"3\" name=\"qty[{$row['product_id']}]\" value=\"{$_SESSION['cart'][$row['product_id']]['quantity']}\"> </td>
<td>@ {$row['product_price']} = </td> 
<td> &pound ".number_format($subtotal, 2)."</td></tr>";
  }
  mysqli_close($link);

  echo ' <tr>
  <td>Total = &pound '.number_format($total,2).'</td>
  </tr>
  <tr>
  <td> 
  <input type="submit" name="submit" class= "btn btn-dark" value="Update My Cart"> 
  </td>
  </tr>
  <td><a class= "btn btn-dark" href="checkout.php?total='.$total.' ">Checkout Now</a></td>
  </table>
  </form>';
}
else
{ echo '<p>Your cart is currently empty.</p>' ; }

?>