<?php
require 'includes/session.php';




$preferred_name=$_POST['filename'];
$uploaded_by=$_SESSION['eid'];
    if(ISSET($_POST['submit'])){
        if($_FILES['upload']['name'] != "") {
            $file = $_FILES['upload'];
            $file_name = $file['name'];
            $file_temp = $file['tmp_name'];
            $name = explode('.', $preferred_name);
            $path = "../admin/uploads/".$file_name;
            $conn->query("INSERT INTO `file_upload` VALUES('', '$name[0]', '$path','$uploaded_by',default)") or die(mysqli_error());
      move_uploaded_file($file_temp, $path);

            echo "<script>window.history.back();</script>";

        }else{
            echo "<script>alert('Required Field!')</script>";
            echo "<script>window.history.back();</script>";
        }

}else{
    echo "<script>alert('Please Select a Folder to upload')</script>";
    echo "<script>window.history.back();</script>";
}
?>
