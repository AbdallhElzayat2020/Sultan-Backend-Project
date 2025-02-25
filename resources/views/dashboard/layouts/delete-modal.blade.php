<div class="modal fade " id="delete{{ $model->id }}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title text-danger">
                    حذف {{ $title }}
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ $route }}" method="post">
                @method('delete')
                @csrf
                <div class="modal-body">
                    <p>هل أنت متأكد انك تريد حذف <span class="text-danger">{{ $title }}</span> ؟</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </div>
            </form>
        </div>
    </div>
</div>
