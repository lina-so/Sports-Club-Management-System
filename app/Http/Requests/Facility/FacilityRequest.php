<?php

namespace App\Http\Requests\Facility;

use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FacilityRequest extends FormRequest
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
        $id =$this->route('facility');

        return [
            'name' => ["required", "string", "min:3", "max:50", Rule::unique('facilities','name')->ignore($id)],
            'description'=>['nullable','string','min:1','max:255'],
            'status'=>['in:available,disable'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The facility name field is required.',
            'name.string' => 'The facility name must be a valid string.',
            'name.min' => 'The facility name must be at least 3 characters long.',
            'name.max' => 'The facility name may not be greater than 50 characters.',
            'name.unique' => 'The facility name has already been taken. Please choose a different name.',

            'description.string' => 'The description must be a valid string.',
            'description.min' => 'The description must be at least 1 character long.',
            'description.max' => 'The description may not be greater than 255 characters.',

            'status.in' => 'The status must be either available or disable.',
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
