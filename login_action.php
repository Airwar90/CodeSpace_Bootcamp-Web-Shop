<?php # PROCESS LOGIN ATTEMPT.
# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )
{
 # Open database connection.
 require ( 'connect_db.php' ) ;
 # Get connection, load, and validate functions.
 require ( 'login_tools.php' ) ;
 # Check login.
 list ( $check, $data ) = validate ( $link, $_POST[ 'user_email' ], $_POST[ 'user_password' ] ) ;
 # On success set session data and display logged in page.
 if ( $check )
 {
 # Access session.
 session_start();
 $_SESSION[ 'user_id' ] = $data[ 'user_id' ] ;
 $_SESSION[ 'user_firstname' ] = $data[ 'user_firstname' ] ;
 $_SESSION[ 'user_lastname' ] = $data[ 'user_lastname' ] ;
 load ( 'home.php' ) ;
 }
 # Or on failure set errors.
 else { $errors = $data; }
 # Close database connection.
 mysqli_close( $link ) ;
}
# Continue to display login page on failure.
include ( 'login-form.php' ) ;
?>