<div class="modal admin-modal" tabindex="-1" role="dialog" id="createAccountModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <form id="createAccountForm">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fa fa-user"></i> New account
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="required-fields mb-2">
                        Fields marked with <sup><i class="fa fa-asterisk fa-form"></i></sup> are required.
                    </p>

                    <!-- Role -->
                    <div class="form-group select-box">
                        <label for="role_id">Role</label>
                        <select class="role_id form-control req_place" name="role_id[]" id="role_id" multiple="multiple">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>

                        <span class="invalid-feedback role_id"></span>
                    </div>

                    <!-- Title -->
                    <div class="form-group">
                        <label for="title">Title <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <select name="title" id="title" class="form-control title">
                            <option value="">Select a title</option>

                            @foreach (ProfileTitles::all() as $title => $description)
                                <option value="{{ $title }}">{{ $description }}</option>
                            @endforeach
                        </select>

                        <span class="invalid-feedback title"></span>
                    </div>

                    <!-- First Name -->
                    <div class="form-group">
                        <label for="first_name">First name <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="text" class="form-control admin-modal-input  first_name" id="first_name" name="first_name" placeholder="Enter first name" />

                        <span class="invalid-feedback first_name"></span>
                    </div>

                    <!-- Last name -->
                    <div class="form-group">
                        <label for="last_name">Last name <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="text" class="form-control admin-modal-input last_name" id="last_name" name="last_name" placeholder="Enter last name" />

                        <span class="invalid-feedback last_name"></span>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">E-Mail Address <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="text" class="form-control email admin-modal-input"  id="email" name="email" placeholder="example@domain.com" />

                        <span class="invalid-feedback email"></span>
                    </div>

                    <!-- Password-->
                    <div class="form-group mb-1">
                        <label for="create_password" class="mb-0">Password <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>

                        <input type="password" class="form-control mt-8 password admin-modal-input" id="password" name="password" placeholder="Give password to the user" />

                        <span class="invalid-feedback password"></span>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input admin-modal-input" type="checkbox" name="create-password" id="auto_password" value="auto"  checked />
                        <label class="form-check-label" for="auto_password">
                            Auto generate password
                        </label>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-account admin-modal-btn" id="storeAccount">Save</button>
                    <button type="button" class="btn btn-secondary admin-modal-btn-close" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div><!-- /.modal-content -->
    </div>
</div>