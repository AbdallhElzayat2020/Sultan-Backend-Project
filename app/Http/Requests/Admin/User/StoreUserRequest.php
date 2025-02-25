<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:254'],
            'email' => ['required', 'email', 'max:254', 'unique:users'],
            'role' => ['required', 'string', 'exists:roles,name'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'max:254'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'role' => 'الدور',
            'password' => 'كلمة المرور',
        ];
    }
}
