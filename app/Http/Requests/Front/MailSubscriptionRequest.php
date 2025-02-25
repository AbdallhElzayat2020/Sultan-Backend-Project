<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class MailSubscriptionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'max:254'],
        ];
    }

    public function attributes(): array
    {
        return [
            'email' => 'البريد الإلكتروني',
        ];
    }
}
