<form method="POST" action="{{ $url }}" class="float-right">
    @csrf
    @method('DELETE')
    <button
        type="submit"
        class="btn btn-danger btn-sm remove"
        data-confirm="Are you sure you want to remove this item?"
    >
        Remove
    </button>
</form>
