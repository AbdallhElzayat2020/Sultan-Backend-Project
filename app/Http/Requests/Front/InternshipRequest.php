<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class InternshipRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'years_of_exp' => ['required', 'string', 'max:255'],
            'field_of_exp' => ['required', 'string', 'max:255'],
            'education' => ['required', 'string', 'max:255'],
            'note' => ['nullable', 'string', 'max:65535'],
            'file' => ['nullable', 'file', 'mimes:pdf,doc,docx', 'max:5000'],
        ];
    }
}
