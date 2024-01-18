<div class="modal fade" id="addEventModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="eventForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-6 mt-2 p-2">
                            <div class="form-group">
                              <label>Title</label>
                              <input type="text" class="form-control" required name="title" placeholder="Enter Title">
                            </div>
                        </div>

                         <div class="col-md-6 mt-2 p-2">
                            <div class="form-group">
                                <label>Event Date</label>
                                <input type="date" class="form-control datepicker" name="event_date" />
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" name="details"></textarea>
                            </div>
                         </div>

                        <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label>Photo</label>
                                  <input type="file" class="form-control" id="photo" name="image" onchange="loadFile(event)">
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
