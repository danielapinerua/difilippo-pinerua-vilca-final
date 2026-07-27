<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:usuarios,email,' . \Illuminate\Support\Facades\Auth::id(),
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede exceder 255 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.string' => 'El email debe ser texto.',
            'email.email' => 'El formato del email es inválido.',
            'email.max' => 'El email no puede exceder 255 caracteres.',
            'email.unique' => 'Este email ya está registrado.',
            'address.required' => 'La dirección es obligatoria.',
            'address.string' => 'La dirección debe ser texto.',
            'address.max' => 'La dirección no puede exceder 255 caracteres.',
            'city.required' => 'La ciudad es obligatoria.',
            'city.string' => 'La ciudad debe ser texto.',
            'city.max' => 'La ciudad no puede exceder 255 caracteres.',
            'province.required' => 'La provincia es obligatoria.',
            'province.string' => 'La provincia debe ser texto.',
            'province.max' => 'La provincia no puede exceder 255 caracteres.',
            'postal_code.required' => 'El código postal es obligatorio.',
            'postal_code.string' => 'El código postal debe ser texto.',
            'postal_code.max' => 'El código postal no puede exceder 20 caracteres.',
        ];
    }
}
