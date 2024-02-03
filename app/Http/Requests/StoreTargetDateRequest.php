<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTargetDateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
          'title' => ['required', 'max:55'],
          'targetDate' => ['required', 'date_format:Y-m-d', 'before:2049-12-31'],
          'targetDateType' => ['required', 'in:1,2']
        ];
    }
}
