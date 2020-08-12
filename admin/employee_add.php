
<?php
	include 'includes/session.php';
include 'includes/header.php';



if(isset($_POST['add'])){
		$employee_id = $_POST['employee_id'];
        $password = $_POST['password'];
        $username=$_POST['username'];
        $conpassword = $_POST['conpassword'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$birthdate = $_POST['birthdate'];
		$contact = $_POST['contact'];
		$gender = $_POST['gender'];
		$position = $_POST['position'];
		$schedule = $_POST['schedule'];
		$schedule = $_POST['schedule'];
		$fingerid = $_POST['fingerid'];
		$filename = $_FILES['photo']['name'];

		if(!empty($filename)){
			move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$filename);	
		}
        if($password != $conpassword){
            $_SESSION['error'] = 'Password does not match!';

        }
        elseif ($password == $conpassword) {
            $sql = "INSERT INTO employees (employee_id,username, password, firstname, lastname, address, birthdate, contact_info, gender, position_id, schedule_id, photo, created_on) VALUES ('$employee_id','$username', '$password', '$firstname', '$lastname', '$address', '$birthdate', '$contact', '$gender', '$position', '$schedule', '$filename', NOW())";
            if ($conn->query($sql)) {
                $_SESSION['success'] = 'Employee added successfully';
            } else {
                $_SESSION['error'] = $conn->error;
            }
        }
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: employee.php');
?>