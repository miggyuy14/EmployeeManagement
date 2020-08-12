<?php

include 'includes/session.php';

$_SESSION['file_id']=$_GET['fileid'];
$fileid=$_SESSION['file_id'];


$query = "DELETE FROM `file_upload` WHERE id='$fileid'";

if(mysqli_query($conn,$query)){
    if(mysqli_query($conn,$query)){
        echo "<script type='text/javascript'>alert('File Deleted!')</script>";
        echo "<script>window.history.back();</script>";
    }
}else{

    echo "<script type='text/javascript'>alert('Something went wrong!')</script>";
    echo "<script>window.history.back();</script>";
}

?>