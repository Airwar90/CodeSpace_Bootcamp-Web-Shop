<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.0/css/fontawesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet" type="text/css"/>    
    <title>MK Time</title>
    <link rel="icon" type="image/x-icon" href="icons/logo.ico">
</head>
<body>

<?php
include('includes/nav.php');
require('connect_db.php');
?>
<br><br>
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
			<div class="carousel-inner">
			<div class="carousel-item active">
			<img class="d-block w-100" src="land1.jpg" alt="First slide">
			
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="land3.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
			<img class="d-block w-100" src="land5.jpg" alt="Third slide">
			</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
  <br><br>
  <?php
  echo '<div class = container> 	
  <div class="row">';
  require('connect_db.php');  
  $q = "SELECT * FROM products" ;
  $r = mysqli_query( $link, $q ) ;  
  if ( mysqli_num_rows( $r ) > 0 ) {    
  
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
      echo '
      <div class="col-sm">
      <div class="card" style="width: 18rem;">
      <img src ="'.$row['product_img'].'"class = "card-img-top alt = "'.$row['product_desc'].'">
      <div class="card-body">
      <h5 class="card-title">'.$row['product_name'].'</h5><p class="card-text">&pound'.$row['product_price'].'</p>
      <a href = "added.php?id='.$row['product_id'].'" class = "btn btn-dark">Buy</a></div></div></div>'
      ;
    }    
    mysqli_close($link);    
  }  
  else {echo '<p> There are no items found.</p>';}
  echo '</div></div>';
  ?>  
  </body>
</html>
