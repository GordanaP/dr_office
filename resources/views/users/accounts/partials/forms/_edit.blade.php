<form action="{{ route('users.accounts.update') }}" method="POST" id="userAccountForm">

    <p class="required-fields mb-18">
        Fields marked with <sup><i class="fa fa-asterisk fa-form"></i></sup> are required.
    </p>

    @method('PUT')
    @csrf

    <!-- Name -->
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right"><sup><i class="fa fa-asterisk fa-form red"></i></sup> Name</label>

        <div class="col-md-6">
            <input type="text" class="name form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="name" name="name" placeholder="Enter your name" value="{{ old('name') ?: $user->name }}" autofocus />

            @if ($errors->has('name'))
                <span class="name invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Email -->
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right"><sup><i class="fa fa-asterisk fa-form red"></i></sup> E-Mail Address</label>

        <div class="col-md-6">
            <input type="text" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  id="email" name="email" placeholder="example@domain.com" value="{{ old('email') ?: $user->email }}" />

            @if ($errors->has('email'))
                <span class="invalid-feedback email">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Password -->
    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input type="password" class="password form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"  id="password" name="password" placeholder="Choose your password" />

            @if ($errors->has('password'))
                <span class="password invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Confirm password -->
    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

        <div class="col-md-6">
            <input type="password" class="form-control"  id="password-confirm" name="password_confirmation" placeholder="Retype password">
        </div>
    </div>

    <!-- Button -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-info">Save changes</button>
        </div>
    </div>

</form>