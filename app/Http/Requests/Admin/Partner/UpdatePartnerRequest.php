<?php

namespace App\Http\Requests\Admin\Partner;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:254'],
            'status' => ['required', Rule::enum(Status::class)],
            'logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png', 'max:2500'],
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
}
