<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'timezone.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Attendance
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Attendance</li>
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
                            <!-- optional add
                          <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                          -->
                        </div>
                        <div class="box-body" style="display: block; overflow: scroll; overflow-x: scroll; width: auto;">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th class="hidden"></th>

                                <th>Date</th>

                                <!--
                                <th>Employee ID</th>
                                -->

                                <th>User Name</th>
                                <th>Time In</th>
                                <th>Time Out</th>

                                </thead>
                                <tbody>
                                <?php
                                $emp_id=$_SESSION['user'];
                                $sql = "SELECT * FROM attendance WHERE employee_id='$emp_id'ORDER BY id DESC";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    $status = ($row['status'])?'<span class="label label-warning pull-right">ontime</span>':'<span class="label label-danger pull-right">late</span>';
                                    ?>

                                    <tr>
                                        <td class='hidden'></td>
                                        <td><?php echo $row['date'];?></td>

                                        <!--
                          <td><?php echo $row['employee_id'];?></td>
                          -->

                                        <td><?php echo $row['username'] ?></td>
                                        <td><?php echo $row['time_in'].$status;?></td>
                                        <td><?php echo $row['time_out'];?></td>

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
