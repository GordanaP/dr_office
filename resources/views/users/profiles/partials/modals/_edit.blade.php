<div class="modal admin-modal" tabindex="-1" role="dialog" id="profileModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa"></i>
                    <span></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- UPDATE FORM -->
            <form id="adminProfileForm">
                <div class="modal-body">
                    <p class="required-fields mb-18">Please fill in at least one of fields below.</p>

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control name admin-modal-input" type="text" name="name" id="profileName" placeholder="Enter profile name">

                        <span class="invalid-feedback name"></span>
                    </div>

                    <!-- About -->
                    <div class="form-group">
                        <label for="about">About</label>
                        <textarea class="form-control about admin-modal-input" name="about" id="about" rows="5" placeholder="Introduce the user in less than 150 characters"></textarea>

                        <span class="invalid-feedback about"></span>
                    </div>

                    <!-- Location -->
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input class="form-control location admin-modal-input" type="text" name="location" id="location" placeholder="Enter location">

                        <span class="invalid-feedback location"></span>
                    </div>
                </div>
                <div class="modal-footer flex justify-between">
                    <button type="button" class="btn btn-danger btn-profile admin-modal-btn-delete" id="deleteProfile">Delete</button>
                    <div>
                        <button type="submit" class="btn btn-primary btn-profile admin-modal-btn" id="saveProfile">Save changes</button>
                        <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>