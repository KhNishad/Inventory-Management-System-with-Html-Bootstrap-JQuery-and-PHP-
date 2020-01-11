<!-- Modal -->
<div class="modal fade" id="form_pro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_pro_form" onsubmit="return false">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="hidden" id="cid" name="cid" value="">
                        <input type="text" class="form-control" name="update_p_name" id="update_p_name" aria-describedby="emailHelp" placeholder="Enter Name">
                        <small id="pro_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="hidden" id="cid" name="cid" value="">
                        <input type="text" class="form-control" name="update_p_email" id="update_p_email" aria-describedby="emailHelp" placeholder="Enter Name">
                        <small id="pro_error" class="form-text text-muted"></small>
                    </div>
                    <div class="form-group">
                        <label>Registration Date</label>
                        <input type="hidden" id="cid" name="cid" value="">
                        <input type="text" readonly class="form-control" name="update_p_pass" id="update_p_pass" aria-describedby="emailHelp" placeholder="Enter Name">
                        <small id="pro_error" class="form-text text-muted"></small>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>