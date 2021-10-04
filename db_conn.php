<?php
//connect to mysql
$mysqli = new mysqli('localhost', 'dengm', '448185', 'dengm');

if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
?>