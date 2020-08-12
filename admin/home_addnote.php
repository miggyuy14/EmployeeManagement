
<?php
include 'includes/session.php';


if(isset($_POST['add'])) {
    $subject = $_POST['subject'];
    $content = $_POST['content'];


    $sql = "INSERT INTO `announcement` (subject, content, date_created) VALUES ('$subject', '$content',  NOW())";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Notice added successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
}

else{
    $_SESSION['error'] = 'Fill up add form first';
}

header('location: notice.php');
?>
