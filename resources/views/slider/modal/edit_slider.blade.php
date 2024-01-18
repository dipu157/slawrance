<div class="modal fade" id="editSliderModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="sliderEditForm">
                    @csrf
                    <div class="row">

                        <input type="hidden" name="id" id="bmem_id">
                        <input type="hidden" name="bmem_photo" id="bmem_photo">

                        <div class="col-md-12 mt-2 p-2">
                            <div class="form-group row">
                                <label for="title" class="col-sm-4 col-form-label text-md-right">Title</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-sm-4 col-form-label text-md-right">Description</label>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <textarea class="form-control" name="description" id="description" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label>Image</label>
                                  <input type="file" class="form-control" id="image" name="image" onchange="loadFile(event)">
                                </div>
                              </div>
                              <div class="col-md-2 mt-2" id="logo_img">
                                <span id="photospan">
                                  <img id="output" height="120px" width="100px" />
                                </span>
                              </div>
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
