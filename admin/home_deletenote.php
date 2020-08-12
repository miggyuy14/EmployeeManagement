<?php
include 'includes/session.php';


    $id = $_GET['id'];
    $sql = "DELETE FROM announcement WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Notice deleted successfully';
    }
    else{
        $_SESSION['error'] = 'Something went wrong!';
    }



header('location: notice.php');

?>