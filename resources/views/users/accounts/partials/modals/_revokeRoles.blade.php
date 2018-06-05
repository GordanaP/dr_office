<div class="modal admin-modal" tabindex="-1" role="dialog" id="revokeRolesModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="revokeRolesForm">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-user"></i>
                        <span></span>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="required-fields mb-18">
                        <sup><i class="fa fa-asterisk fa-form"></i></sup> Required field
                    </p>

                    <!-- Roles -->
                    <div class="form-group">

                        <label for="role_id">Revoke role(s) <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <div id="role">

                            <!-- Render checkbox values for the specific user by using an ajax call -->

                        </div>

                        <span class="invalid-feedback role_id"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary admin-modal-btn" id="revokeRoles">Revoke</button>
                    <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div><!-- /. modal-content -->
    </div>
</div>