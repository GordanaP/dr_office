<div class="card mb-4 box-shadow bg-lightest-grey" id="adminSettings">
    <div class="card-body">
        <h5 class="card-title ls-1 text-uppercase text-bold-grey mb-15">
            <i class="fa fa-user mr-6"></i> <span class="mr-15">My account</span>
            <button type="button" class="btn btn-warning btn-link" id="editAccount" data-name="{{ Auth::user()->name }}" value="{{Auth::user()->id }}">
                Edit
            </button>
        </h5>

        <div id="myAccount">
            <p class="card-text mb-8 ml-20">
                <b>User name:</b> {{ Auth::user()->name }}
            </p>
            <p class="card-text mb-8 ml-20">
                <b>Email:</b> {{ Auth::user()->email }}
            </p>
            <p class="card-text">
                <b>Password: <i class="fa fa-lock"></i></b>
            </p>
        </div>
    </div>

    <div class="card-body">
        <div id="myProfile">
            <h5 class="card-title ls-1 text-uppercase text-bold-grey mb-15">
                <i class="fa fa-user-o mr-6"></i> <span class="mr-15">My profile</span>
                <button type="button" class="btn btn-warning btn-link" id="editProfile"  data-name="{{ Auth::user()->name }}" value="{{Auth::user()->id }}">
                    {{ Auth::user()->hasProfile() ? 'Edit' : 'Create' }}
                </button>

                @if (Auth::user()->hasProfile())
                    <button type="button" class="btn btn-danger btn-link admin-modal-btn-delete" value="{{Auth::user()->id }}">
                        Delete
                    </button>
                @endif
            </h5>

            <p class="card-text mb-8">
                <b>Profile name:</b> {{ optional(Auth::user()->profile)->name ?: 'N/A' }}
            </p>
            <p class="card-text mb-8">
                <b>About:</b> {{ optional(Auth::user()->profile)->about  ?: 'N/A' }}
            </p>
            <p class="card-text">
                <b>Location:</b> {{ optional(Auth::user()->profile)->location  ?: 'N/A' }}
            </p>
        </div>
    </div>
</div>