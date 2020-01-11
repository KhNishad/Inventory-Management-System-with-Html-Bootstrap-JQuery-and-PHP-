<!-- Modal -->
<div class="modal fade" id="form_brand" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="update_brand_form" onsubmit="return false">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="hidden" id="bid" name="bid" value="">
                        <input type="text" class="form-control" name="update_brand" id="update_brand" aria-describedby="emailHelp" placeholder="Enter Category">
                        <small id="brand_error" class="form-text text-muted"></small>
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