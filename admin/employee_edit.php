<?php
	include 'includes/session.php';
include 'includes/header.php';
date_default_timezone_set('Asia/Manila');
	if(isset($_POST['edit'])){
		$empid = $_POST['id'];
		$employeeid=$_POST['employee_id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
        $password = $_POST['password'];
        $username=$_POST['username'];
        $conpassword = $_POST['conpassword'];
       

        if($password != $conpassword){
            $_SESSION['error'] = 'Password does not match!';

        }
        elseif ($password == $conpassword) {
            $sql = "UPDATE employees 
            SET firstname = '$firstname', lastname = '$lastname', address = '$address', birthdate = '$birthdate', contact_info = '$contact', 
            gender = '$gender', position_id = '$position', schedule_id = '$schedule',username='$username',password='$password', employee_id='$employeeid'    
            WHERE id = '$empid'";
            if ($conn->query($sql)) {
                $_SESSION['success'] = 'Employee updated successfully';
            } else {
                $_SESSION['error'] = $conn->error;
            }
        }

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>