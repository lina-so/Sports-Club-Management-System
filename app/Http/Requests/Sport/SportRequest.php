<?php

namespace App\Http\Requests\Sport;

use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SportRequest extends FormRequest
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
        $id =$this->route('sport');

        return [
            'name' => ["required", "string", "min:3", "max:50", Rule::unique('sports','name')->ignore($id)],
            'description'=>['required','string','min:1','max:255'],
            'status'=>['in:active,disable'],
            'Duration'=>['required','integer'],
            'price' => 'required|numeric|min:0|max:999999.99',
            'club_id'=>['required','exists:clubs,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.min' => 'The name must be at least 3 characters.',
            'name.max' => 'The name may not be greater than 50 characters.',
            'name.unique' => 'The name has already been taken. Please choose a different name.',

            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a valid string.',
            'description.min' => 'The description must be at least 1 character.',
            'description.max' => 'The description may not be greater than 255 characters.',

            'status.in' => 'The status must be either active or disable.',

            'Duration.required' => 'The duration field is required.',
            'Duration.integer' => 'The duration must be an integer value.',

            'price.required' => 'The price field is required.',
            'price.decimal' => 'The price must be a valid decimal number within the range 1 to 99999.',

            'club_id.required' => 'The club field is required.',
            'club_id.exists' => 'The selected club is invalid. Please select a valid club.',
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'message'   => 'Validation errors',
            'data'      => $validator->errors()
        ]));
    }
}
