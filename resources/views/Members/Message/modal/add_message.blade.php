<div class="modal fade" id="addMessageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Testimonial</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="messageForm">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mt-2 p-2">

                            <div class="form-group row required">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">Name</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="name" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row required">
                                <label for="position" class="col-sm-4 col-form-label text-md-right">Position</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="position" class="form-control" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="message" class="col-sm-4 col-form-label text-md-right">Message</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="message" cols="50" rows="4"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="photo" class="col-sm-4 col-form-label text-md-right">Photo</label>
                                <div class="col-sm-6">
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="photo" name="photo" onchange="loadFile(event)">
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <span id="photospan">
                                      <img id="output" height="120px" width="100px" />
                                    </span>
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

<script>
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
        var output = document.getElementById('output');
        output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>


