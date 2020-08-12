<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<head><script src="js/jquery-2.2.3.min.js"></script></head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Add new finger print for <?php echo $_GET['id'].' '.$_GET['name']?>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Employees</li>
                <li class="active">Employee List</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
            <div class="alert">
                <label id="alert"></label>
            </div>
            <div class="form-group">
                <label for="fingerprintid" class="col-sm-3 control-label" style="margin-top: 25px;">Fingerprint ID</label>

                <div class="col-md-9">
                    <label>Enter Fingerprint ID between 1 & 127:</label>
                    <input type="number" min="1" max="127" class="form-control" id="fingerid" name="fingerid" placeholder="User Fingerprint ID..." required>
                </div>
                <button type="button" name="fingerid_add" class="fingerid_add btn btn-primary btn-flat" style="float:right; margin: 15px;">Add Fingerprint ID</button>
            </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>