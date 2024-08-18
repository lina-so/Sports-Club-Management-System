<?php

namespace App\Http\Requests\Club;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ClubRequest extends FormRequest
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
        $id =$this->route('club');

        return [
            'name' => ["required", "string", "min:3", "max:50", Rule::unique('clubs','name')->ignore($id)],
            'address' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-zA-Z0-9\s\-\,]+$/u' //   العنوان يحتوي فقط على أحرف وأرقام ومسافات وشرطات وفواصل
            ],
            'establish_date' => [
                'required',
                'date',
                'before_or_equal:today' // يجب أن يكون تاريخ الإنشاء في الماضي أو اليوم
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The club name is required.',
            'name.string' => 'The club name must be string.',
            'name.min' => 'The club name must be contain at least 3 characters.',
            'name.max' => 'The club name must be contain 50 characters maximum.',

            'address.required' => 'The address is required.',
            'address.regex' => 'The address can only contain letters, numbers, spaces, dashes, and commas.',
            'address.max' => 'The address must be contain 255 characters maximum.',
            
            'establish_date.required' => 'The establish date is required.',
            'establish_date.date' => 'The establish date must be a valid date.',
            'establish_date.before_or_equal' => 'The establish date cannot be in the future.',
        ];
    }
}
