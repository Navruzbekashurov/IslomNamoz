<?php

namespace App\Http\Requests\Section;

use App\Enums\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSectionRequest extends FormRequest
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
            'type_id' => ['required', 'exists:types,id'],
            'content' => ['required', 'array'],
            'content.*.id' => ['required', 'integer'],
            'content.*.language' => ['required', Rule::in(Language::values())],
            'content.*.field_name' => ['required', Rule::in(['name', 'description'])],
            'content.*.field_value' => ['required', 'string'],
        ];
    }
}
