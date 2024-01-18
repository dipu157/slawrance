<div class="modal fade" id="addNoticeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="noticeForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-2 p-2">

                            <div class="form-group row required">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="title" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="notice_date" class="col-sm-4 col-form-label text-md-right">Notice Date</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="notice_date" class="form-control datepicker" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="description" cols="50" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="attachment" class="col-sm-4 col-form-label text-md-right">Attachment</label>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="attachment" name="attachment">
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>
                    <input type="submit" class="btn btn-primary" id="btnsave" value="Save">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


