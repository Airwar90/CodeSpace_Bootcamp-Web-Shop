<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

<?php
include ('includes/nav.html'); 
if ($_SERVER['REQUEST_METHOD']	==	'POST') 
{
	#looks for the php file that enstablishes the connection to the server
	require('connect_db.php');
	#inizialize error array
	$errors = array();
	
	#checks if first_name field is completed
	if(empty($_POST['user_firstname'])) {
		$errors[] = 'Enter First Name';}
	else {
	#escapes special characters in a string for use in an SQL query
	$fn = mysqli_real_escape_string($link, trim($_POST['user_firstname']));}
	
	#checks if last_name field is completed
	if(empty($_POST['user_lastname'])) {
		$errors[] = 'Enter Last Name';}
	else {
	#escapes special characters in a string for use in an SQL query
	$ln = mysqli_real_escape_string($link, trim($_POST['user_lastname']));}
	#checks for email
	if(empty($_POST['user_email'])) {
		$errors[] = 'Enter email address';}
	else {
	#escapes special characters in a string for use in an SQL query
	$em = mysqli_real_escape_string($link, trim($_POST['user_email']));}
	#checks for password
	if(!empty($_POST['user_password'])) {
		if ( $_POST[ 'user_password' ] != $_POST[ 'user_password2' ] )
		{ $errors[] = 'Passwords do not match.' ; }
		else
		{ $pw = mysqli_real_escape_string( $link, trim( $_POST[ 'user_password' ] ) ) ; }	
	}	
	else { $errors[] = 'Enter password';}	
	#checks if user already exists
		#if error array is empty meaning all fields where filled correctly
	if(empty($errors)) {
		#variable that stores the query to chech the id input
		$q = "SELECT user_email FROM users WHERE user_email='$em'";
		#sends the query to the db?
		$r = mysqli_query($link, $q);
		if(mysqli_num_rows($r) != 0) $errors[] = 'User already registered';
	}
	#on success stores the input data into my_table
		#if error array is empty meaning all fields where filled correctly
	if(empty($errors)) {
		$q = "INSERT INTO users(user_firstname, user_lastname, user_email, user_password, reg_date) VALUES('$fn', '$ln', '$em', '$pw', NOW())";
		$r = mysqli_query($link, $q);
		if($r) {
			echo '<p>User registered</p>';
		}		
		#close database connection
		mysqli_close($link);
		exit();
	}	
}
else 
  {
	echo '
    <script type ="text/JavaScript">
    alert("' ;
    foreach ( $errors as $msg )
    { echo "$msg " ; }
    echo 'Please try again.")</script>';
    # Close database connection.
    mysqli_close( $link );
  }  
?>
</body>
</html>


