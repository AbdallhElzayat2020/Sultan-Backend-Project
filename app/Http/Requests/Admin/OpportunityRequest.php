<?php

namespace App\Http\Requests\Admin;

use App\Enums\OpportunityType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OpportunityRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'max:254'],
            'phone' => ['required'],
            'years_of_exp' => ['required', 'integer'],
            'field_of_exp' => ['nullable', 'integer'],
            'education' => ['required'],
            'job_title' => ['nullable'],
            'type' => ['required', Rule::enum(OpportunityType::class)],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'الاسم',
            'email' => 'البريد الإلكتروني',
            'phone' => 'رقم الهاتف',
            'years_of_exp' => 'سنوات الخبرة',
            'field_of_exp' => 'مجال الخبرة',
            'education' => 'المؤهل الدراسي',
            'job_title' => 'المسمى الوظيفي',
            'type' => 'النوع',
        ];
    }
}
