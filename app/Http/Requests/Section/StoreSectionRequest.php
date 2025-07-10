<?php

namespace App\Http\Requests\Section;

use App\Enums\Language;
use App\Models\Translation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'type_id' => ['required', 'int'],
            'content' => ['required', 'array'],
            'content.*.language' => ['required', Rule::in(Language::values())],
            'content.*.field_name' => ['required', Rule::in(['name', 'description'])],
            'content.*.field_value' => ['required', 'string'],
        ];
    }

}
