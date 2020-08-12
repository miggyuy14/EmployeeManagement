<?php
include 'includes/session.php';

if(isset($_POST['edit'])){
    $id=$_SESSION['id'];
    $subject = $_POST['subject'];
    $content = $_POST['content'];


    $sql = "UPDATE announcement SET subject = '$subject', content = '$content'WHERE id = '$id'";
    if($conn->query($sql)){
        $_SESSION['success'] = 'announcement updated successfully';
    }
    else{
        $_SESSION['error'] = $conn->error;
    }

}
else{
    $_SESSION['error'] = 'Select employee to edit first';
}

header('location: notice.php');
?>