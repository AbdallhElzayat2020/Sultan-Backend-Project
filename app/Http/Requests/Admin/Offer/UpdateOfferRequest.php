<?php

namespace App\Http\Requests\Admin\Offer;

use App\Enums\OfferPriceType;
use App\Enums\OfferType;
use App\Enums\PropertyLocations;
use App\Enums\PropertyType;
use App\Enums\Status;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOfferRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'array'],
            'short_title' => ['required', 'array'],

            'description' => ['required', 'array'],
            'short_description' => ['required', 'array'],

            'property_specifications' => ['required', 'array'],
            'property_contents' => ['required', 'array'],
            'property_features' => ['required', 'array'],
            'financial_communication' => ['required', 'array'],

            'price' => ['required', 'numeric'],
            'price_type' => ['required', Rule::enum(OfferPriceType::class)],
            'status' => ['required', Rule::enum(Status::class)],
            'offer_type' => ['required', Rule::enum(OfferType::class)],
            'property_type' => ['required', Rule::enum(PropertyType::class)],
            'location' => ['required', Rule::enum(PropertyLocations::class)],

            'files' => ['sometimes', 'array'],
            'files.*' => ['file', 'mimes:jpg,png,jpeg', 'max:3000'],

            'brochure' => ['nullable', 'file', 'mimes:pdf', 'max:4000'],
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
            'title' => 'العنوان',
            'short_title' => 'العنوان المختصر',

            'description' => 'الوصف',
            'short_description' => 'الوصف المختصر',

            'property_specifications' => 'مواصفات العقار',
            'property_contents' => 'محتويات العقار',
            'property_features' => 'ميزات العقار',
            'financial_communication' => 'التواصل المالي',

            'price' => 'السعر',
            'price_type' => 'نوع السعر',
            'status' => 'الحالة',
            'offer_type' => 'نوع العرض',
            'property_type' => 'نوع العقار',
            'location' => 'الموقع',

            'files' => 'الملفات',
            'files.*' => 'الملفات',
            'brochure' => 'الكتيب',
        ];
    }
}
