<form action="{{ route('users.accounts.destroy') }}" method="POST">

    @csrf
    @method("DELETE")

    <button type="submit" class="btn-delete-account" onclick="return confirm('Are you sure you want to delete your account?')">
        Delete account
    </button>

</form>