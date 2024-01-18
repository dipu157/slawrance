<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<div class="modal fade" id="editMenuPageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Menu Page</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="menuPageEditForm">
                    @csrf
                    <div class="row">

                        <input type="hidden" name="id" id="bmem_id">
                        <input type="hidden" name="bmem_photo" id="bmem_photo">

                        <div class="col-md-12 mt-2 p-2">
                            <div class="form-group">
                                <label>Menu Name</label>
                                {!! Form::select('menu_id',$menus,null,array('id'=>'menu_id','class'=>'form-control')) !!}
                              </div>

                            <div class="form-group">
                              <label>Title</label>
                              <input type="text" class="form-control" name="title" id="title" placeholder="Enter title">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description" rows="5" cols="5" ></textarea>
                            </div>
                        </div>

                      </div>

                      <div class="form-group row">
                        <label for="image" class="col-sm-4 col-form-label text-md-right">Image</label>
                        <div class="col-sm-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image" onchange="loadFile(event)">
                            </div>
                        </div>

                        <div class="col-sm-2"  id="logo_img">
                            <span id="photospan">
                              <img id="output" height="120px" width="100px" />
                            </span>
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

    CKEDITOR.replace('editor');


</script>

