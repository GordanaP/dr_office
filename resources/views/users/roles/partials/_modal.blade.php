<div class="modal admin-modal" tabindex="-1" role="dialog" id="roleModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="roleForm">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa mr-6"></i>
                        <span></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="required-fields mb-18">
                        <sup><i class="fa fa-asterisk fa-form"></i></sup> Required field.
                    </p>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name  <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>
                        <input type="text" class="form-control name admin-modal-input" id="name" name="name" placeholder="Enter role name">

                        <span class="invalid-feedback name"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-role admin-modal-btn"></button>
                    <button type="button" class="btn btn-secondary  admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>