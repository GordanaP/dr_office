<div class="modal admin-modal" tabindex="-1" role="dialog" id="editAccountModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-lock"></i> Edit user
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="editAccountForm">
                <div class="modal-body">
                    <p class="required-fields mb-18">
                        Fields marked with <sup><i class="fa fa-asterisk fa-form"></i></sup> are required.
                    </p>

                    <!-- Role -->
                    @if ($roles)
                    <div class="form-group">
                        <label for="_role_id">Role</label>
                        <select class="role_id form-control req_place" name="role_id[]" id="_role_id" multiple="multiple">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                        <span class="invalid-feedback role_id"></span>
                    </div>
                    @endif

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Name <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="text" class="form-control name admin-modal-input" id="_name" name="name" placeholder="Enter your name" />

                        <span class="invalid-feedback name"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">E-Mail Address <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="text" class="form-control email admin-modal-input"  id="_email" name="email" placeholder="example@domain.com" />

                        <span class="invalid-feedback email"></span>
                    </div>

                    <!-- Password-->
                    <div class="form-group mb-0">
                        <label for="create_password" class="mb-0">Password <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="password" class="form-control mt-8 password admin-modal-input" id="_password" name="password" placeholder="Give password to the user" />

                        <span class="password invalid-feedback"></span>
                    </div>

                    <div class="form-group mt-12" id="check-password">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="create-password" id="_unchanged_password" value="unchanged" checked />
                            <label class="form-check-label" for="_unchanged-password">
                                Do not change password
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="create-password" id="_auto_password" value="auto" />
                            <label class="form-check-label" for="_auto-password">
                                Auto generate password
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="create-password" id="_manual_password" value="manual" />
                            <label class="form-check-label" for="_manual_password">
                                Create password for the user
                            </label>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-account admin-modal-btn" id="updateAccount">Save changes</button>
                    <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div>
</div>