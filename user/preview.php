<?php
session_start();
$_SESSION['pre_file']=$_GET['file'];
$file_preview=$_SESSION['pre_file'];
?>
<!DOCTYPE HTML>
<html>
<head></head>
<body>
<?php
$file_parts = pathinfo($file_preview);
switch($file_parts['extension'])
{
    case "jpg":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;
    case "JPG":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;

    case "jpeg":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;
    
    case "png":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;
    
    case "PNG":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;
    
    case "pdf":
        echo "<iframe src='http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;
    
    case "doc":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "docx":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "xls":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads//$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "xlsx":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "ppt":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "pptx":
        echo "<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://biometricwithapp.xyz/admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'></iframe>";
    break;
    
    case "txt":
        echo "<iframe src='http://biometricwithapp.xyz//admin/uploads/$file_preview' width='100%' height='720px' frameborder='0'> </iframe>";
    break;

    case "": // Handle file extension for files ending in '.'
    case NULL: // Handle no file extension
    break;
}
    
    



?>
</body>
</html>