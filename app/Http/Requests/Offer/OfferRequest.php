<?php

namespace App\Http\Requests\Offer;

use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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
    public function rules()
    {
        return [
            'discount' => 'required|numeric|min:0|max:999999.99',
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'usage_limit' => 'required|integer|min:1',
            'sport_id' => 'required|exists:sports,id',
        ];
    }


    public function messages()
    {
        return [
            'discount.required' => 'The discount field is required.',
            'discount.numeric' => 'The discount must be a valid number.',
            'discount.min' => 'The discount must be at least 0.',
            'discount.max' => 'The discount may not be greater than 999999.99.',

            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.before_or_equal' => 'The start date must be before or equal to the end date.',

            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',

            'usage_limit.required' => 'The usage limit is required.',
            'usage_limit.integer' => 'The usage limit must be an integer.',
            'usage_limit.min' => 'The usage limit must be at least 1.',
            
            'sport_id.required' => 'The sport field is required.',
            'sport_id.exists' => 'The selected sport is invalid.',
        ];
    }


}
