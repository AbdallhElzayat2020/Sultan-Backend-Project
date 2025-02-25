<?php

namespace App\Http\Requests\Admin;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TestimonialRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'client_name' => ['required', 'string', 'max:254'],
            'job_title' => ['nullable', 'string', 'max:254'],
            'testimonial' => ['required', 'string', 'max:65535'],
            'status' => ['required', Rule::enum(Status::class)],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('status')) {
            $this->merge(['status' => Status::ACTIVE->value]);
        } else {
            $this->merge(['status' => Status::INACTIVE->value]);
        }
    }

    public function attributes(): array
    {
        return [
            'client_name' => 'اسم العميل',
            'job_title' => 'وظيفة العميل',
            'testimonial' => 'التوصية',
            'status' => 'الحالة',
        ];
    }
}
