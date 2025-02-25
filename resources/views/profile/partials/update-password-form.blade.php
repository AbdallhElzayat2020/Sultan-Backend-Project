<h5 class="card-header">تغيير كلمة المرور</h5>
<div class="card-body">
    <form id="formAccountDeactivation" action="{{ route('password.update') }}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="mb-3">
                <label for="current_password" class="form-label">كلمة المرور الحالية</label>
                <input class="form-control" type="password" id="current_password" name="current_password"/>

                <x-input-error class="mt-2" :messages="$errors->get('current_password')" />
            </div>

            <div class="mb-3 col-md-6">
                <label for="password" class="form-label">كلمة المرور الجديدة</label>
                <input class="form-control" type="password" id="password" name="password"/>

                <x-input-error class="mt-2" :messages="$errors->get('password')" />
            </div>
            <div class="mb-3 col-md-6">
                <label for="password_confirmation" class="form-label">تأكيد كلمة المرور الجديدة</label>
                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">حفظ</button>
    </form>
</div>
