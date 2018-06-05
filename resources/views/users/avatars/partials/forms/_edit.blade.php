<form action="{{ route('users.avatars.update') }}" method="POST" enctype="multipart/form-data" id="userAvatarForm">

    <p class="required-fields mb-18">
        <sup><i class="fa fa-asterisk fa-form"></i></sup> Required field
    </p>

    @csrf
    @method('PUT')

    <div class="row">

        <!-- Show avatar -->
        <div class="col-lg-4 col-sm-4 mb-12">
            <img src="{{ asset(setAvatar($user)) }}" alt="{{ $user->name . ' Avatar' }}" class="image img-responsive rounded-circle" style="width: 200px; height: 200px">
        </div>

        <div class="col-lg-8 col-sm-8">

            <!-- Avatar options -->
            <div class="form-group">
                <label for="avatar_options">Avatar <sup><i class="fa fa-asterisk fa-form red"></i></sup></label>
                <select name="avatar_options" id="avatar_options" class="form-control{{ $errors->has('avatar_options') ? ' is-invalid' : '' }}">
                    <option value="">Choose one</option>
                    @foreach (AvatarOptions::all() as $value => $text)
                        <option value="{{ $value }}" {{ selected(old('avatar_options'), $value) }} >
                            {{ $text }}
                        </option>
                    @endforeach
                </select>

                @if ($errors->has('avatar_options'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('avatar_options') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Avatar -->
            <div class="form-group mt-30">
                <input type="file" class="{{ $errors->has('avatar_options') ? ' is-invalid' : '' }}" name="avatar" id="avatar"/>

                @if ($errors->has('avatar'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('avatar') }}</strong>
                    </span>
                @endif
            </div>

            <!-- Button -->
            <div class="form-group">
                <button type="submit" class="btn btn-info mt-24">Save changes</button>
            </div>
        </div>
    </div>

</form>