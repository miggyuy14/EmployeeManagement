<?php
/* Database connection settings */
	$servername = "sql308.epizy.com";
    $username = "epiz_26426127";		//put your phpmyadmin username.(default is "root")
    $password = "wh5Gs02lDdr";			//if your phpmyadmin has a password put it here.(default is "root")
    $dbname = "epiz_26426127_biometrics";
    
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
?>