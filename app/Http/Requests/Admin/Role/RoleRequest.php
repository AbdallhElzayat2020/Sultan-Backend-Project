<?php

namespace App\Http\Requests\Admin\Role;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'display_name' => ['required'],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['required', 'exists:permissions,id'],
        ];
    }

    public function attributes(): array
    {
        return [
            'display_name' => 'اسم الصلاحية',
            'permissions' => 'الصلاحيات',
            'permissions.*' => 'الصلاحيات',
        ];
    }
}
