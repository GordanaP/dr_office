<div class="card border-0" id="pageTitle">

    <h2 class="admin-title">
        <span id="userProfileName" class="mr-3">
            {{ $profile->title }} {{ $profile->getFullName() }}
        </span>

        <button type="button" class="btn btn-warning btn-link" id="editProfile" data-name="{{ $profile->user->name }}" value="{{$profile->user->id }}">
             Edit
        </button>
    </h2>

</div>

<hr>