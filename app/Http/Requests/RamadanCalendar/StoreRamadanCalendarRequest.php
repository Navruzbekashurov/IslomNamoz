<?php

namespace App\Http\Requests\RamadanCalendar;

use Illuminate\Foundation\Http\FormRequest;

class StoreRamadanCalendarRequest extends FormRequest
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

            'region_id'=>['required','integer', 'exists:regions,id'],
            'date'=>['required','date'],
            'suhoor_time'=>['required','date_format:H:i'],
            'iftar_time'=>['required', 'after:suhoor_time','date_format:H:i']
        ];
    }
}
