<?php

include 'includes/session.php';

$id=$_GET['leaveid'];


$query = "DELETE FROM `leaves` WHERE id='$id'";

if(mysqli_query($conn,$query)){
    if(mysqli_query($conn,$query)){
        echo "<script type='text/javascript'>alert('Leave Cancelled!')</script>";
        echo "<script>window.history.back();</script>";
    }
}else{

    echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
    echo "<script>window.history.back();</script>";
}

?>