<?php
include 'includes/session.php';

$id = $_GET["leaveid"];

// Prepare an insert statement
$query = "UPDATE `leaves` SET status='approved' WHERE id ='$id'";
if(mysqli_query($conn,$query)){
    echo "<script type='text/javascript'>alert('Password Updated!')</script>";
    echo "<script>window.location='leave_application.php'</script>";

}else{

    echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
    echo "<script>window.location='leave_application.php'</script>";
}

?>