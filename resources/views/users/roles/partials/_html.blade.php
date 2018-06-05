@foreach ($user->roles as $role)

    <div class="checkbox" id="role_id">
        <label>
            <input type="checkbox" value="{{ $role->id }}" class="role_id" name="role_id[]" />
            {{ $role->name }}
        </label>
    </div>

@endforeach
