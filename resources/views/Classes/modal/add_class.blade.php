<div class="modal fade" id="addClassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="classForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mt-2 p-2">

                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" class="form-control" name="class_name" placeholder="Enter Class Name">
                              </div>
                        </div>

                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label>Class Image</label>
                                  <input type="file" class="form-control" id="image" name="image" onchange="loadImage(event)">
                                </div>
                              </div>
                              <div class="col-md-2 mt-2">
                                <span id="imagespan">
                                  <img id="output2" height="120px" width="100px" />
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

    var loadImage = function(event) {
        var reader2 = new FileReader();
        reader2.onload = function(){
        var output2 = document.getElementById('output2');
        output2.src = reader2.result;
        };
        reader2.readAsDataURL(event.target.files[0]);
    };
</script>
