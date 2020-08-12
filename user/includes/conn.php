<?php
	$conn = new mysqli('localhost', 'u625435172_matt', '12345678', 'u625435172_apsystem');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>