<form action="{{ route('users.profiles.update') }}" method="POST" id="userProfileForm" >

    <p class="required-fields mb-18">Please fill in at least one of fields below.</p>

    @csrf
    @method('PUT')

    <!-- Name -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="name form-control{{ $errors->has('name') ? "class = has-error" : '' }}" name="name" id="name" placeholder="Enter your name" value="{{ old('name') ?: optional($user->profile)->name }}" autofocus />

        @if ($errors->has('name'))
            <span class="invalid-feedback name">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <!-- about -->
    <div class="form-group">
        <label for="about">About</label>
        <textarea name="about" id="about" class="about form-control{{ $errors->has('about') ? "class = has-error" : '' }}" rows="3" placeholder="Introduce yourself in less than 150 characters">{{ old('about') ?? optional($user->profile)->about }}</textarea>

        @if ($errors->has('about'))
            <span class="invalid-feedback about">
                <strong>{{ $errors->first('about') }}</strong>
            </span>
        @endif
    </div>

    <!-- Location -->
    <div class="form-group">
        <label for="location">Location</label>
        <input type="text" class="location form-control{{ $errors->has('location') ? "class = has-error" : '' }}" name="location" id="location" placeholder="Enter your location" value="{{  old('location') ?: optional($user->profile)->location }}" />

        @if ($errors->has('location'))
            <span class="invalid-feedback location">
                <strong>{{ $errors->first('location') }}</strong>
            </span>
        @endif
    </div>

    <!-- Update Button -->
    <div class="flex align-center">
        <div class="form-group">
            <button type="submit" class="btn btn-info">Save {{ $user->profile ? 'changes' : 'profile' }}</button>
        </div>
</form>

<!-- Delete button -->
@if ($user->profile)
         <div class="form-group ml-6">
            @include('users.profiles.partials.forms._delete')
        </div>
    </div>
@endif