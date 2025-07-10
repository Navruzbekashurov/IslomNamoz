<?php

namespace App\Http\Requests\AllahName;

use App\Enums\Language;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreAllahNameRequest extends FormRequest
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

      //  dd(Language::values());
        return [
            'name_arabic' => ['required', 'string'],
            'content' => ['required', 'array'],
            'content.*.language' => ['required', Rule::in(Language::values())],
            'content.*.field_name' => ['required', Rule::in(['name', 'description'])],
            'content.*.field_value' => ['required', 'string'],
        ];
    }
}
