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
                File Management
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">File Management</li>
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
                            <form class="form-inline" method="POST" action="admin_upload.php" enctype="multipart/form-data">
                                <input class="form-control" type="file" name="upload" required/>
                                <input class="form-control" type="text" name="filename" placeholder="input file name" required/>

                                <button type="submit" class="btn btn-success form-control" name="submit"><span class="glyphicon glyphicon-upload"></span> Upload</button>
                            </form>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th class="hidden"></th>
                                <th>File ID</th>
                                <th>File Name</th>
                                <th>File Type</th>
                                <th>Uploaded By</th>
                                <th>Date Uploaded</th>
                                <th>Action</th>


                                </thead>
                                <tbody>
                                <?php
                                $row = $conn->query("SELECT * FROM `file_upload` ") or die(mysqli_error());
                                while($fetch = $row->fetch_array()){
                                    ?>
                                    <tr>
                                        <?php
                                        $name = explode('/', $fetch['filepath']);
                                        $id = explode('/', $fetch['id']);
                                        $filefetchtype=$fetch['filepath'];
                                        $file_part = pathinfo($filefetchtype, PATHINFO_EXTENSION);
                                        ?>
                                        <td><p><?php echo $id[0]?></p>
                                        <td><a href="preview.php?file=<?php echo $name[3]?>"target="_blank"><?php echo $fetch['file_name']?></a></td>
                                        <td><p><?php echo $file_part?></p>

                                        </td>
                                        <td><p><?php echo $fetch['uploaded_by']?></p>

                                        </td>
                                        <td><p><?php echo $fetch['date_uploaded']?></p>

                                        </td>
                                        <td><a href="download.php?file=<?php echo $name[3]?>" class="btn btn-info"><span class="glyphicon glyphicon-download"></span> Download</a>
                                            <a href="deletefile.php?fileid=<?php echo $id[0]?>" class="btn btn-danger">Delete file</a>
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
