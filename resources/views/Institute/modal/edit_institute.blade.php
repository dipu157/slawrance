<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<div class="modal fade" id="editInstituteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Institute</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="edit_instituteForm">
                    @csrf
                    <div class="row">

                        <input type="hidden" name="id" id="ins_id">
                        <input type="hidden" name="emp_photo" id="ins_logo">

                        <div class="col-md-6 mt-3">
                          <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                          </div>

                          <div class="form-group">
                              <label>Website</label>
                              <input type="text" class="form-control" name="website" id="website">
                          </div>

                          <div class="form-group">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email" id="email">
                            </div>

                            <div class="form-group">
                              <label>Facebook Link</label>
                              <input type="text" class="form-control" name="social_link1" id="social_link1">
                            </div>

                            <div class="form-group">
                              <label>Linkedin Link</label>
                              <input type="text" class="form-control" name="social_link2" id="social_link2">
                            </div>

                          <div class="form-group">
                              <label>Address</label>
                              <textarea class="form-control" cols="50" rows="2" name="address" id="address"></textarea>
                          </div>
                      </div>

                       <div class="col-md-6 mt-3">
                          <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control" name="phone" id="phone">
                            </div>

                          <div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" name="city" id="city">
                          </div>

                          <div class="form-group">
                              <label>State</label>
                              <input type="text" class="form-control" name="state" id="state">
                          </div>

                          <div class="form-group">
                              <label>Post Code</label>
                              <input type="text" class="form-control" name="post_code" id="post_code">
                          </div>

                          <div class="form-group">
                              <label>Twitter Link</label>
                              <input type="text" class="form-control" name="social_link3" id="social_link3">
                            </div>

                            <div class="form-group">
                              <label>Youtube Link</label>
                              <input type="text" class="form-control" name="social_link4" id="social_link4">
                            </div>

                            <div class="form-group">
                              <label>Google Map Link</label>
                              <textarea class="form-control" cols="50" rows="2" name="map_link" id="map_link"></textarea>
                          </div>                          
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>History</label>
                                <textarea class="form-control" cols="50" rows="2" name="history" id="history"></textarea>
                            </div>
                        </div>
                      </div>

                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Logo</label>
                                  <input type="file" class="form-control" id="logo" name="logo" onchange="loadFile(event)">
                                </div>
                              </div>
                              <div class="col-md-6" id="logo_img">
                                <span id="logo">
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
