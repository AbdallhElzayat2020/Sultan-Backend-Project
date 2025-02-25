<?php

namespace App\Http\Requests\Admin\Blog;

use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBlogRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'status' => ['required', Rule::enum(Status::class)],

            'title.ar' => ['required', 'string', 'max:254'],
            'title.en' => ['required', 'string', 'max:254'],

            'excerpt.ar' => ['required', 'string', 'max:65535'],
            'excerpt.en' => ['required', 'string', 'max:65535'],

            'content.ar' => ['required', 'string'],
            'content.en' => ['required', 'string'],

            'file' => ['sometimes', 'file', 'mimes:jpg,jpeg,png', 'max:1024'],
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
            'status' => 'الحالة',

            'title.ar' => 'العنوان بالعربية',
            'title.en' => 'العنوان بالإنجليزية',

            'excerpt.ar' => 'المقتطف بالعربية',
            'excerpt.en' => 'المقتطف بالإنجليزية',

            'content.ar' => 'المحتوى بالعربية',
            'content.en' => 'المحتوى بالإنجليزية',

            'file' => 'الملف',
        ];
    }
}
