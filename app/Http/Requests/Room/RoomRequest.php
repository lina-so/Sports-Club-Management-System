<?php

namespace App\Http\Requests\Room;

use Illuminate\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
        $id =$this->route('room');

        return [
            'name' => ["required", "string", "min:3", "max:50", Rule::unique('rooms','name')->ignore($id)],
            'description'=>['required','string','min:1','max:255'],
            'status'=>['in:available,disable'],
            'room_capacity'=>['required','integer','max:50','min:1'],
            'sport_id'=>['required','integer','exists:sports,id']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The room name field is required.',
            'name.string' => 'The room name must be a valid string.',
            'name.min' => 'The room name must be at least 3 characters long.',
            'name.max' => 'The room name may not be greater than 50 characters.',
            'name.unique' => 'The room name has already been taken. Please choose a different name.',

            'description.required' => 'The description field is required.',
            'description.string' => 'The description must be a valid string.',
            'description.min' => 'The description must be at least 1 character long.',
            'description.max' => 'The description may not be greater than 255 characters.',

            'status.in' => 'The status must be either available or disable.',

            'room_capacity.required' => 'The room capacity field is required.',
            'room_capacity.integer' => 'The room capacity must be an integer.',
            'room_capacity.min' => 'The room capacity must be at least 1.',
            'room_capacity.max' => 'The room capacity may not be greater than 50.',

            'sport_id.required' => 'The sport field is required.',
            'sport_id.integer' => 'The sport ID must be an integer.',
            'sport_id.exists' => 'The selected sport is invalid. Please select a valid sport.',
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
