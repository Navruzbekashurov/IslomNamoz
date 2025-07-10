<?php

namespace App\Http\Requests\Region;

use App\Enums\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRegionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'content' => ['required', 'array'],
            'content.*.language' => ['required', Rule::in(Language::values())],
            'content.*.field_name' => ['required', 'in:name'],
            'content.*.field_value' => ['required', 'string'],
        ];
    }
}
