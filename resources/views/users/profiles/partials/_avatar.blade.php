<div id="userProfileAvatar" class="text-center mb-12">
    <img src="{{ asset(setAvatar($user->profile)) }}" alt="" class="image img-responsive rounded-circle" height="260px">
</div>

<a href="#" id="changeAvatar"  data-name="{{ $user->name }}" data-profile="{{ $user->profile->slug }}">
    Change
</a>