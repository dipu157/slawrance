<div class="modal fade" id="editMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="menuEditForm">
                    @csrf
                    <div class="row">

                        <input type="hidden" name="id" id="bmem_id">

                        <div class="col-md-12 mt-2 p-2">
                            <div class="form-group">
                              <label>Menu Name</label>
                              <input type="text" class="form-control" id="name" name="name" >
                            </div>

                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" id="slug" name="slug" >
                            </div>

                            <div class="form-group">
                                <label>Position</label>
                                <input type="number" class="form-control" id="position" name="position">
                            </div>
                        </div>

                      </div>
                    <input type="submit" class="btn btn-primary" id="btnupdate" value="Update">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


