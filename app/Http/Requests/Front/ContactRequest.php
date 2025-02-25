<?php

namespace App\Http\Requests\Front;

use App\Enums\OfferType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:254'],
            'phone' => ['required', 'string', 'max:254'],
            'service_id' => ['required', 'integer', 'exists:services,id'],
            'offer_type' => ['required', Rule::enum(OfferType::class)],
            'message' => ['required', 'string', 'max:65535'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'الاسم',
            'offer_type' => 'نوع العقار',
            'phone' => 'رقم الهاتف',
            'service_id' => 'الخدمة',
            'message' => 'الرسالة',
        ];
    }
}
