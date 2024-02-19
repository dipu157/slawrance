<div class="modal fade" id="addMemberModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Board Member</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="bmemberForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mt-2 p-2">
                            <div class="form-group">
                              <label>Full Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Enter Full Name">
                            </div>

                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" name="position" placeholder="Enter position">
                              </div>
                        </div>

                         <div class="col-md-6 mt-2 p-2">
                              <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control select2" name="gender" style="width: 100%;">
                                  <option selected="selected" disabled="">Select Gender</option>
                                  <option value="m">Male</option>
                                  <option value="f">Female</option>
                                </select>
                              </div>

                              <div class="form-group">
                                  <label>Mobile</label>
                                  <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile No.">
                              </div>

                        </div>

                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label>Photo</label>
                                  <input type="file" class="form-control" id="photo" name="photo" onchange="loadFile(event)">
                                </div>
                              </div>
                              <div class="col-md-2 mt-2">
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
