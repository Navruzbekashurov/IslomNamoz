<?php

namespace App\Http\Requests\RamadanCalendar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRamadanCalendarRequest extends FormRequest
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
            'region_id'    => ['required', 'integer', 'exists:regions,id'],
            'date'         => ['required', 'date'],
            'suhoor_time'  => ['nullable', 'date_format:H:i'],
            'iftar_time'   => ['nullable', 'after:suhoor_time','date_format:H:i'],
        ];
    }

}
