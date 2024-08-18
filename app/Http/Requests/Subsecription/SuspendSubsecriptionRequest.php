<?php

namespace App\Http\Requests\Subsecription;

use Illuminate\Foundation\Http\FormRequest;

class SuspendSubsecriptionRequest extends FormRequest
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
        return [
            'suspension_reason' => 'required|string',
            'status' => 'in:pending,active,inactive,suspended,accepted,rejected',

        ];
    }
}
