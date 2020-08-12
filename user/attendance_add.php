<?php
	include 'includes/session.php';

	if(isset($_POST['add'])) {
        $employee = $_POST['employee'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $reason = $_POST['reason'];
        $category = $_POST['category'];
        $time_in = $_POST['time_in'];
        $time_out = $_POST['time_out'];


        $query = "INSERT INTO `leaves` (id,employee_id,reason,category,firstname,lastname,leave_start,leave_end,status) VALUES ('','$employee','$reason','$category','$fname','$lname','$time_in','$time_out','For approval')";

            if (mysqli_query($conn, $query)) {
                echo "<script type='text/javascript'>alert('Please wait for confirmation')</script>";
                echo "<script>window.history.back();</script>";
            }

        else{

        echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
        echo "<script>window.history.back();</script>";
    }
}

?>