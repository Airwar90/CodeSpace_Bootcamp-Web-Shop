<?php
include('includes/nav.html');
session_start();
if(!isset($_SESSION['user_id'])) {require('login_tools.php'); load();}
$page_title = 'Goodbye';
$_SESSION = array();
session_destroy();
echo '<h1 class="goodbye">Goodbye!</h1> <p>You are now logged out.</p><p><a href = "login-form.php">Login</a></p> '
?>