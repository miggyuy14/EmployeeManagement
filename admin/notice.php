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
                Notice Board
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Employees</li>
                <li class="active">Employee List</li>
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
                            <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th>Subject</th>
                                <th>Announcement</th>
                                <th>Date created</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $sql = "SELECT * FROM `announcement`";
                                $query = $conn->query($sql);
                                while($row = $query->fetch_assoc()){
                                    $subject = explode('/', $row['subject']);
                                    $content = explode('/', $row['content']);
                                    $date = explode('/', $row['date_created']);


                                    ?>
                                    <?php
                                        $_SESSION['id']=$row['id'];
                                    ?>
                                    <td><p><?php echo $subject[0]?></p>
                                    <td><p><?php echo $content[0]?></p>
                                    <td><p><?php echo $date[0]?></p>
                                        <td>
                                            <button class="btn btn-success btn-sm edit btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-edit"></i> Edit</button>
                                            <button class="btn btn-danger btn-sm delete btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fa fa-trash"></i> Delete</button>
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
    <?php include 'includes/home_modal.php'; ?>
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
            var id = $(this).data('id');    getRow(id);
        });

        $('.photo').click(function(e){
            e.preventDefault();
            var id = $(this).data('id');
            getRow(id);
        });

    });

    function getRow(id){
        $.ajax({
            type: 'POST',
            url: 'home_row.php',
            data: {id:id},
            dataType: 'json',
            success: function(response){
                $('#edit-subject').val(response.subject);
                $('#edit-content').val(response.content);


            }
        });
    }
</script>
</body>
</html>
