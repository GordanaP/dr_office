<div class="modal admin-modal" tabindex="-1" role="dialog" id="profileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa"></i>
                    <span>Edit profile</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- UPDATE FORM -->
            <form id="adminProfileForm">
                <div class="modal-body">
                    <p class="required-fields mb-18">Please fill in at least one of fields below.</p>

                    <!-- Title ame -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control title admin-modal-input" type="text" name="title" id="title" placeholder="Enter title">

                        <span class="invalid-feedback title"></span>
                    </div>

                    <!-- First name -->
                    <div class="form-group">
                        <label for="first_name">Name</label>
                        <input class="form-control first_name admin-modal-input" type="text" name="first_name" id="first_name" placeholder="Enter first name">

                        <span class="invalid-feedback first_name"></span>
                    </div>

                    <!-- First name -->
                    <div class="form-group">
                        <label for="last_name">Name</label>
                        <input class="form-control last_name admin-modal-input" type="text" name="last_name" id="last_name" placeholder="Enter first name">

                        <span class="invalid-feedback last_name"></span>
                    </div>
                </div>

                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-danger btn-profile admin-modal-btn-delete" id="deleteProfile">Delete</button>
                    <div> --}}
                        <button type="button" class="btn btn-primary btn-profile admin-modal-btn" id="saveProfile">Save changes</button>
                        <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                    {{-- </div> --}}
                </div>
            </form>
        </div>
    </div>
</div>