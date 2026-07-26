<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutProcessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // We use middleware 'auth' in routes
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Inject session cart into the request so Laravel validator can process it
        $this->merge([
            'cart' => session()->get('cart', []),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'cart' => 'required|array|min:1',
            'cart.*.quantity' => 'required|integer|min:1',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'cart.required' => 'El carrito está vacío.',
            'cart.array' => 'Formato de carrito inválido.',
            'cart.min' => 'El carrito está vacío.',
            'cart.*.quantity.required' => 'La cantidad es obligatoria.',
            'cart.*.quantity.integer' => 'La cantidad debe ser un número.',
            'cart.*.quantity.min' => 'La cantidad mínima es 1.',
        ];
    }
}
