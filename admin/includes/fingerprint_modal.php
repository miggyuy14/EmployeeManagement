<head>
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/manage_users.js"></script>
</head>
<div class="modal fade" id="addfinger">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Fingerprint</b></h4>
            </div>
            <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
            <div class="modal-body">
                    <div class="alert">
                        <label id="alert"></label>
                    </div>
                    <div class="form-group">
                        <label for="fingerprintid" class="col-sm-3 control-label" style="margin-top: 25px;">Fingerprint ID</label>

                        <div class="col-sm-9 ">
                            <label>Enter Fingerprint ID between 1 & 127:</label>
                            <input type="number" min="1" max="127" class="form-control" id="fingerid" name="fingerid" placeholder="User Fingerprint ID..." required>
                        </div>
                        <button type="button" name="fingerid_add" class="fingerid_add btn btn-primary btn-flat" style="float:right; margin: 15px;">Add Fingerprint ID</button>
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>
