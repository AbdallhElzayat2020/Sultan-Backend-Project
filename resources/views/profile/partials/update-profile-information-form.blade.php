<h5 class="card-header">تفاصيل الملف الشخصي</h5>

<div class="card-body">
    <form action="{{ route('admin.profile.update') }}" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="mb-3 col-md-6">
                <label for="name" class="form-label">الاسم</label>
                <input class="form-control" type="text" id="name" name="name"
                       value="{{ old('name', $user->name) }}"/>
                <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>
            <div class="mb-3 col-md-6">
                <label for="email" class="form-label">البريد الإلكتروني</label>
                <input class="form-control" type="text" id="email" name="email"
                       value="{{ old('email', $user->email) }}"/>
                <x-input-error class="mt-2" :messages="$errors->get('email')"/>
            </div>
        </div>
        <div class="mt-2">
            <button type="submit" class="btn btn-primary me-2">حفظ التعديلات</button>
        </div>
    </form>
</div>
