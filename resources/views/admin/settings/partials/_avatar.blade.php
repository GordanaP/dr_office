<div id="myAvatar" class="text-center mb-12">
    <img src="{{ asset(setAvatar($user)) }}" alt="" class="image img-responsive rounded-circle">
</div>

<a href="#" id="editAvatar"  data-name="{{ Auth::user()->name }}" data-user="{{ Auth::user()->id }}">
    Change
</a>