<div class="card mb-4 box-shadow bg-lightest-grey" id="adminSettings">

    <div class="card-body">
        <div id="userProfile">

            <p class="card-text mb-8">
                <b>Profile name:</b> {{ setFullName($user->profile->first_name, $user->profile->last_name) ?: $user->name }}
            </p>

            <button type="button" class="btn btn-warning btn-link" id="editProfile"  data-name="{{ $user->name }}" value="{{$user->id }}">
                {{ 'Edit' }}
            </button>

        </div>
    </div>
</div>