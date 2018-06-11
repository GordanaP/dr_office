<div class="modal admin-modal" tabindex="-1" role="dialog" id="educationModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-graduation-cap"></i>
                    <span></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- FORM -->
            <form id="educationForm">
                <div class="modal-body">
                    <p class="required-fields mb-18">* Required field.</p>

                    <!-- Education -->
                    <div class="form-group">
                        <label for="education">Education  <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>
                        <textarea name="education" id="education" rows="5" class="form-control education" placeholder="Enter education"></textarea>

                        <span class="invalid-feedback education"></span>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-profile admin-modal-btn" id="saveEducation"></button>
                    <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>