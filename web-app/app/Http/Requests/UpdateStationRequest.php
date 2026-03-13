<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'           => 'sometimes|string|max:255',
            'latitude'       => 'sometimes|numeric|between:-90,90',
            'longitude'      => 'sometimes|numeric|between:-180,180',
            'address'        => 'sometimes|string|max:500',
            'connector_type' => 'sometimes|string',
            'power_kw'       => 'sometimes|integer|min:1',
            'status'         => 'sometimes|in:available,reserved,occupied,maintenance',
        ];
    }
}
