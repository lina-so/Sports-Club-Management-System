<?php

namespace App\Http\Requests\Payment;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            'subscription_id' => 'required|exists:subscriptions,id',
            'price' => 'required|numeric|min:0.01|max:999999.99',
            'date_of_pay' => 'required|date',
            'payment_method' => 'required|string|max:255',
            'status' => 'in:paid,unpaid',

        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'The user ID is required.',
            'user_id.exists' => 'The selected user ID is invalid.',

            'subscription_id.required' => 'The subscription ID is required.',
            'subscription_id.exists' => 'The selected subscription ID is invalid.',

            'price.required' => 'The price is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least 0.01.',
            'price.max' => 'The price may not be greater than 999999.99.',

            'date_of_pay.required' => 'The date of payment is required.',
            'date_of_pay.date' => 'The date of payment must be a valid date.',

            'payment_method.required' => 'The payment method is required.',
            'payment_method.string' => 'The payment method must be a string.',
            'payment_method.max' => 'The payment method may not be greater than 255 characters.',
        ];
    }
}
