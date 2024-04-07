<?php
    $servername = "localhost";
	$username = "centralcaverna_developer";
	$password = 'bwj3M&W2asaB';
	$dbname = "centralcaverna_database";
	$connect = mysqli_connect($servername, $username, $password, $dbname);
	
	mysqli_set_charset($connect, 'utf8mb4');
	
    if (!$connect) {
        die('Error DB: ' . mysqli_connect_error());
    }
?>