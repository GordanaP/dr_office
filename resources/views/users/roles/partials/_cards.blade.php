<div id="displayRoles" class="col-md-12">
    @if ($roles->count())
        @foreach ($roles->chunk(3) as $chunk)
            <div class="row mb-2" id="roleCard">
                @each('users.roles.partials._card', $chunk, 'role')
            </div>
        @endforeach
    @else
        No roles were found.
    @endif
</div>