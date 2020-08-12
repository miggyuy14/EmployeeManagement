<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM `employees` WHERE id = '".$_SESSION['user']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>