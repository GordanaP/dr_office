<form action="{{ route('users.profiles.destroy') }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the profile?')">
        Delete profile
    </button>
</form>