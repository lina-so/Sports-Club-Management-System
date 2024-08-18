<?php

namespace App\Http\Requests\Subsecription;

use Illuminate\Foundation\Http\FormRequest;

class SubsecriptionRequest extends FormRequest
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
            'user_id' => 'required|exists:users,id',
            'sport_id' => 'required|exists:sports,id',
            'offer_id' => 'nullable|exists:offers,id',
            'plan' => 'required|in:monthly,annual,six_months',
            'price' => 'numeric|min:0.01|max:999999.99',
            'discount' => 'nullable|numeric|min:0.00|max:999999.99',
            'start_date' => 'required|date',
            'end_date' => 'date',
            'status' => 'in:pending,active,inactive,suspended,accepted,rejected',
            'suspension_reason' => 'nullable|string',
            'rejection_reason' => 'nullable|string',
        ];
    }

     public function messages()
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID is invalid.',
            'sport_id.required' => 'The sport ID is required.',
            'sport_id.exists' => 'The selected sport ID is invalid.',

            'offer_id.exists' => 'The selected offer ID is invalid.',

            'plan.required' => 'The plan is required.',
            'plan.in' => 'The selected plan is invalid.',

            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.01.',
            'price.max' => 'The price may not be greater than 999999.99.',

            'discount.numeric' => 'The discount must be a number.',
            'discount.min' => 'The discount must be at least 0.00.',
            'discount.max' => 'The discount may not be greater than 999999.99.',

            'start_date.required' => 'The start date is required.',
            'start_date.date' => 'The start date must be a valid date.',
            'start_date.before_or_equal' => 'The start date must be before or equal to the end date.',

            'end_date.required' => 'The end date is required.',
            'end_date.date' => 'The end date must be a valid date.',
            'end_date.after_or_equal' => 'The end date must be after or equal to the start date.',

            'status.in' => 'The selected status is invalid.',

            'suspension_reason.string' => 'The suspension reason must be a string.',

            'rejection_reason.string' => 'The rejection reason must be a string.',
        ];
    }


}
