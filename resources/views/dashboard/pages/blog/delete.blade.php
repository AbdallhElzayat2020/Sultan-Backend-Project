<div class="modal fade" id="delete{{ $blog->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-danger">
                    Delete {{ $blog->name }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to delete <span class="text-danger">{{ $blog->name }}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
