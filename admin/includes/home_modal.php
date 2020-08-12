<head>
    <script src="js/manage_users.js"></script>
</head>
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add Notice</b></h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="home_addnote.php" enctype="multipart/form-data">
                    <div class="alert">
                        <label id="alert"></label>
                    </div>

                    <div class="form-group">
                        <label for="subject" class="col-sm-3 control-label">Subject</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="content" class="col-sm-3 control-label">Content</label>

                        <div class="col-sm-9">
                            <textarea class="form-control" id="content" name="content" required></textarea>
                        </div>
                    </div>





            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Post</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="employee_id"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="home_editnote.php">
                    <input type="hidden" class="id" name="id">
                        <div class="form-group">
                            <label for="edit-subject" class="col-sm-3 control-label">Subject</label>

                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="edit-subject" name="subject" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edit-content" class="col-sm-3 control-label">Content</label>

                            <div class="col-sm-9">
                                <textarea class="form-control" id="edit-content" name="content" required></textarea>
                            </div>
                        </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
