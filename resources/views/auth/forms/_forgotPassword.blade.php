<form action="{{ route('password.email') }}" method="POST" class="forgot-password-form">

    @csrf

    <!-- Email -->
    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="text" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}">

            @if ($errors->has('email'))
                <span class="invalid-feedback email">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <!-- Button -->
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Send Password Reset Link
            </button>
        </div>
    </div>
</form>