<form method="POST" action="{{ route($route) }}" class="d-inline">
    @csrf
    @method('DELETE')
    <input type="hidden" name="id" value="{{ $id }}">
    <button class="btn btn-danger btn-sm"
            onclick="return confirm('Delete this item?')">
        Delete
    </button>
</form>
