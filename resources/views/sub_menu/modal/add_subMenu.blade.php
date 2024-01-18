<div class="modal fade" id="addSubMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Sub Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" class="row g-3" enctype="multipart/form-data" id="submenuForm">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 mt-2 p-2">
                            <div class="form-group">
                                <label>Menu Name</label>
                                {!! Form::select('menu_id',$menus,null,array('id'=>'menu_id','class'=>'form-control')) !!}
                              </div>

                            <div class="form-group">
                              <label>SubMenu Name</label>
                              <input type="text" class="form-control" name="name" placeholder="Enter SubMenu Name">
                            </div>

                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" class="form-control" name="slug" placeholder="Enter Slug">
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


