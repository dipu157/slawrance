<script src="https://cdn.ckeditor.com/4.17.2/standard/ckeditor.js"></script>
<div class="modal fade" id="editClassModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Class</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="classEditForm">
                    @csrf
                    <div class="row">

                        <input type="text" name="id" id="cls_id">
                        <input type="text" name="photo" id="cls_photo">
                        <input type="text" name="image" id="teacher_photo">

                        <div class="col-md-6 mt-2 p-2">

                            <div class="form-group">
                                <label>Class Name</label>
                                <input type="text" class="form-control" name="class_name" id="class_name">
                              </div>

                            <div class="form-group">
                                <label>Position</label>
                                <input type="text" class="form-control" name="position" id="position">
                              </div>

                              <div class="form-group">
                                <label>Student Age</label>
                                <input type="text" class="form-control" name="student_age" id="student_age">
                            </div>
                        </div>

                        <div class="col-md-6 mt-2 p-2">
                            <div class="form-group">
                              <label>Class Teacher Name</label>
                              <input type="text" class="form-control" name="class_teacher_name" id="class_teacher_name">
                            </div>

                            <div class="form-group">
                                <label>Class Time</label>
                                <input type="text" class="form-control" name="class_time" id="class_time">
                            </div>

                            <div class="form-group">
                                <label>Capacity</label>
                                <input type="text" class="form-control" name="capacity" id="capacity">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label>Teacher Photo</label>
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
