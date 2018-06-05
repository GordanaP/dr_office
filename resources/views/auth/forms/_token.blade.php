<form action="{{ route('token.store') }}"  method="POST" class="request-token-form">

    @csrf

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

        <div class="col-md-6">
            <input id="email" type="text" class="email form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" autofocus="">

            @if ($errors->has('email'))
                <span class="invalid-feedback email">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Send Account Activation Link
            </button>
        </div>
    </div>
</form>