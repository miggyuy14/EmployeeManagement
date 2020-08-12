<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Leave Management
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Leave Management</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php
            if(isset($_SESSION['error'])){
                echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                unset($_SESSION['success']);
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <div class="box-header with-border">
                                <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Apply for Leave</a>
                            </div>
                        </div>
                        <div class="box-body" style="display: block; overflow: scroll; overflow-x: scroll; width: auto;">
                            <table id="example1" class="table table-bordered table-sm">
                                <thead>
                                <th class="hidden"></th>
                                
                                <!----
                                <th>Leave ID</th>
                                <th>Employee ID</th>
                                ----->
                                
                                <th>Reason</th>
                                <th>Leave Category</th>
                                <th>Employee Name</th>
                                <th>Leave Start</th>
                                <th>Leave End</th>
                                <th>Status</th>
                                <th>Action</th>


                                </thead>
                                <tbody>
                                <?php
                                $emp_id=$_SESSION['eid'];
                                $row = $conn->query("SELECT * FROM `leaves` WHERE `employee_id` = '$emp_id'") or die(mysqli_error());
                                while($fetch = $row->fetch_array()){
                                    ?>
                                    <tr>
                                        <?php
                                        $reason = explode('/', $fetch['reason']);
                                        $category = explode('/', $fetch['category']);
                                        $status = explode('/', $fetch['status']);
                                        $fname = explode('/', $fetch['firstname']);
                                        $lname = explode('/', $fetch['lastname']);
                                        $sleave = explode('/', $fetch['leave_start']);
                                        $eleave = explode('/', $fetch['leave_end']);
                                        $id = explode('/', $fetch['id']);
                                        $empid = explode('/', $fetch['employee_id']);

                                        ?>
                                        
                                        <!-----
                                        <td><p><?php echo $id[0]?></p>
                                        <td><p><?php echo $empid[0]?></p>
                                        ------>
                                        <td><p><?php echo $reason[0]?></p>
                                        <td><p><?php echo $category[0]?></p>
                                        <td><?php echo $lname[0]." ". $fname[0]?></td>
                                        <td><p><?php echo $sleave[0]?></p>
                                        <td><p><?php echo $eleave[0]?></p>
                                        <td><p><?php echo $status[0]?></p>

                                        </td>

                                        <td>
                                            <a  href="leave_cancel.php?leaveid=<?php echo $id[0]?>" class="btn btn-danger">Cancel Leave</a>
                                        </td>

                                    </tr>
                                    <?php
                                }

                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/attendance_modal.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>

    $(function(){
        $('.edit').click(function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });

        $('.delete').click(function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = $(this).data('id');
            getRow(id);
        });
    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'attendance_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#datepicker_edit').val(response.date);
                $('#attendance_date').html(response.date);
                $('#edit_time_in').val(response.time_in);
                $('#edit_time_out').val(response.time_out);
                $('#attid').val(response.attid);
                $('#employee_name').html(response.firstname+' '+response.lastname);
                $('#del_attid').val(response.attid);
                $('#del_employee_name').html(response.firstname+' '+response.lastname);
            }
        });
    }
</script>
</body>
</html>
