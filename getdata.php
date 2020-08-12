<?php
//Connect to database
require 'connectDB.php';
date_default_timezone_set('Asia/Manila');



if (isset($_POST['FingerID'])) {
    include 'timezone.php';
    $fingerID = $_POST['FingerID'];

    $sql = "SELECT * FROM employees WHERE fingerprint_id=?";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select_card";
        exit();
    }
    else{
        mysqli_stmt_bind_param($result, "s", $fingerID);
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if ($row = mysqli_fetch_assoc($resultl)){
            //*****************************************************
            //An existed fingerprint has been detected for Login or Logout
            if ($row['username'] != "Name"){
                $Uname = $row['username'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $Number = $row['id'];
                $fullname =  $fname.' '.$lname;
                $timein= date('h:i:s');
                $sql = "SELECT * FROM attendance WHERE fingerprint_id=? AND `date`=CURDATE() AND time_out=''";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_logs";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "s", $fingerID);
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);
                    //*****************************************************
                    //Login
                    if (!$row = mysqli_fetch_assoc($resultl)){

                        $sched = $row['schedule_id'];
                        $lognow = date('H:i:a');
                        $sql = "SELECT * FROM schedules WHERE id = '$sched'";
                        $squery = $conn->query($sql);
                        $srow = $squery->fetch_assoc();
                        $logstatus = ($lognow > $srow['time_in']) ? 0 : 1;
                        $sql = "INSERT INTO attendance (username, employee_id, `date`, time_in, status,time_out, fingerprint_id) VALUES (? , ?, CURDATE(), ?, ?, ?,?)";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_Select_login1";
                            exit();
                        }
                        else{
                            $timeout = "0";
                            mysqli_stmt_bind_param($result, "sdsisi", $Uname, $Number,$timein, $logstatus,$timeout, $fingerID);
                            mysqli_stmt_execute($result);

                            echo "login".$Uname;
                            exit();
                        }
                    }
                    //*****************************************************
                    //Logout
                    else{
                        $time_out=$timein= date('h:i:s');
                        $sql="UPDATE attendance SET time_out='$time_out' WHERE fingerprint_id=? AND `date`=CURDATE() AND time_out=''";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_logout1";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "i", $fingerID);
                            mysqli_stmt_execute($result);

                            echo "logout".$Uname;
                            exit();
                        }
                    }
                }
            }
            //*****************************************************
            //An available Fingerprint has been detected
            else{
                $sql = "SELECT fingerprint_select FROM employees WHERE fingerprint_select=1";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select";
                    exit();
                }
                else{
                    mysqli_stmt_execute($result);
                    $resultl = mysqli_stmt_get_result($result);

                    if ($row = mysqli_fetch_assoc($resultl)) {
                        $sql="UPDATE employees SET fingerprint_select=0";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert";
                            exit();
                        }
                        else{
                            mysqli_stmt_execute($result);

                            $sql="UPDATE employees SET fingerprint_select=1 WHERE fingerprint_id=?";
                            $result = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($result, $sql)) {
                                echo "SQL_Error_insert_An_available_card";
                                exit();
                            }
                            else{
                                mysqli_stmt_bind_param($result, "i", $fingerID);
                                mysqli_stmt_execute($result);

                                echo "available";
                                exit();
                            }
                        }
                    }
                    else{
                        $sql="UPDATE employees SET fingerprint_select=1 WHERE fingerprint_id=?";
                        $result = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($result, $sql)) {
                            echo "SQL_Error_insert_An_available_card";
                            exit();
                        }
                        else{
                            mysqli_stmt_bind_param($result, "i", $finger_sel, $fingerID);
                            mysqli_stmt_execute($result);

                            echo "available";
                            exit();
                        }
                    }
                }
            }
        }
        //*****************************************************
        //New Fingerprint has been added
        else{
            $Uname = "Name";
            $Number = "000000";
            $Email= " Email";

            $Timein = "00:00:00";
            $Gender= "Gender";


            $sql="UPDATE employees SET fingerprint_select=0";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
                echo "SQL_Error_insert";
                exit();
            }
            else{
                mysqli_stmt_execute($result);
                $sql = "INSERT INTO employees (username, employee_id, gender, fingerprint_id, fingerprint_select, creted_on,user_date, time_in, add_fingerid) VALUES (?, ?, ?, ?, ?, 1, CURDATE(), CURDATE(), ?, 0)";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_Select_add";
                    exit();
                }
                else{
                    mysqli_stmt_bind_param($result, "sdsis", $Uname, $Number, $Gender, $fingerID, $Timein );
                    mysqli_stmt_execute($result);

                    echo "succesful1";
                    exit();
                }
            }
        }
    }
}
if (isset($_POST['Get_Fingerid'])) {

    if ($_POST['Get_Fingerid'] == "get_id") {
        $sql= "SELECT fingerprint_id FROM employees WHERE add_fingerid=1";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {
                echo "add-id".$row['fingerprint_id'];
                exit();
            }
            else{
                echo "Nothing";
                exit();
            }
        }
    }
    else{
        exit();
    }
}
if (!empty($_POST['confirm_id'])) {

    $fingerid = $_POST['confirm_id'];

    $sql="UPDATE employees SET fingerprint_select=0 WHERE fingerprint_select=1";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
        echo "SQL_Error_Select";
        exit();
    }
    else{
        mysqli_stmt_execute($result);

        $sql="UPDATE employees SET add_fingerid=0, fingerprint_select=1 WHERE fingerprint_id=?";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_bind_param($result, "s", $fingerid);
            mysqli_stmt_execute($result);
            echo "Fingerprint has been added!";
            exit();
        }
    }
}
if (isset($_POST['DeleteID'])) {

    if ($_POST['DeleteID'] == "check") {
        $sql = "SELECT fingerprint_id FROM users WHERE del_fingerid=1";
        $result = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($result, $sql)) {
            echo "SQL_Error_Select";
            exit();
        }
        else{
            mysqli_stmt_execute($result);
            $resultl = mysqli_stmt_get_result($result);
            if ($row = mysqli_fetch_assoc($resultl)) {

                echo "del-id".$row['fingerprint_id'];

                $sql = "DELETE FROM users WHERE del_fingerid=1";
                $result = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($result, $sql)) {
                    echo "SQL_Error_delete";
                    exit();
                }
                else{
                    mysqli_stmt_execute($result);
                    exit();
                }
            }
            else{
                echo "nothing";
                exit();
            }
        }
    }
    else{
        exit();
    }
}
mysqli_stmt_close($result);
mysqli_close($conn);
?>
