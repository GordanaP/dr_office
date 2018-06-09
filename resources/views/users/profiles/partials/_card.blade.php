<div class="card mb-4 box-shadow bg-lightest-grey" id="adminSettings">

    <div class="card-body">
        <div id="userProfile">

            <p class="card-text mb-8">
                <b>Profile name:</b> {{ optional($user->profile)->name ?: 'N/A' }}
            </p>
            <p class="card-text mb-8">
                <b>About:</b> {{ optional($user->profile)->about  ?: 'N/A' }}
            </p>
            <p class="card-text">
                <b>Location:</b> {{ optional($user->profile)->location  ?: 'N/A' }}
            </p>

            <button type="button" class="btn btn-warning btn-link" id="editProfile"  data-name="{{ $user->name }}" value="{{$user->id }}">
                {{ $user->hasProfile() ? 'Edit' : 'Create' }}
            </button>

            @if ($user->hasProfile())
                <button type="button" class="btn btn-danger btn-link admin-modal-btn-delete" value="{{$user->id }}">
                    Delete
                </button>
            @endif
        </div>
    </div>
</div>