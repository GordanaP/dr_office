<div class="modal admin-modal" tabindex="-1" role="dialog" id="avatarModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-user-circle"></i>
                    <span></span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form enctype="multipart/form-data" id="userAvatarForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 mb-12" id="showAvatar"></div>

                        <div class="col-lg-8 col-sm-8">
                            <div class="form-group">
                                <label for="avatar_options">Avatar <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>
                                <select name="avatar_options" id="avatar_options" class="form-control avatar_options admin-modal-input">
                                    <option value="">Choose one</option>
                                    @foreach (AvatarOptions::all() as $value => $text)
                                        <option value="{{ $value }}" {{ selected(old('avatar_options'), $value) }} >
                                            {{ $text }}
                                        </option>
                                    @endforeach
                                </select>

                                <span class="invalid-feedback avatar_options"></span>
                            </div>

                            <div class="form-group mt-30">
                                <input type="file" class="avatar" name="avatar" id="avatar"/>

                                <span class="invalid-feedback avatar"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-account admin-modal-btn" id="saveAvatar">Save changes</button>
                    <button type="button" class="btn  btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>