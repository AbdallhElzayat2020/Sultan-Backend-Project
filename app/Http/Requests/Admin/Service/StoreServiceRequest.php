<?php

namespace App\Http\Requests\Admin\Service;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'contact_number' => ['required', 'string', 'max:254'],
            'status' => ['required', Rule::enum(Status::class)],
            'title.ar' => ['required', 'string', 'max:254'],
            'title.en' => ['required', 'string', 'max:254'],
            'short_description.ar' => ['required', 'string', 'max:65535'],
            'short_description.en' => ['required', 'string', 'max:65535'],
            'description.ar' => ['required', 'string'],
            'description.en' => ['required', 'string'],
            'features' => ['required', 'array', 'min:1'],

            'file' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2500'],
            'icon' => ['required', 'file', 'mimes:jpg,jpeg,png', 'max:2500'],
        ];
    }

    public function attributes(): array
    {
        return [
            'title.en' => 'العنوان بالإنجليزية',
            'title.ar' => 'العنوان بالعربية',
            'short.description.en' => 'الوصف المختصر بالإنجليزية',
            'short.description.ar' => 'الوصف المختصر بالعربية',
            'description.en' => 'الوصف بالإنجليزية',
            'description.ar' => 'الوصف بالعربية',
            'features' => 'المميزات',
            'features.*' => 'المميزات',
            'file' => 'الصورة',
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
