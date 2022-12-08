<!doctype HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
<?php
# Connecto on localhost 'practice'
$link= mysqli_connect('localhost','root','root','web-shop3');
#checks if connection is present
if(!$link) {
	#if not display error message
	die('Could not connect to MySQL: '.mysqli_connect_error());
}
?>
</body>
</html>