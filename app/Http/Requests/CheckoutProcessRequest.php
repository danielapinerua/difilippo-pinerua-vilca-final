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
            'cart.required' => 'Tu carrito de compras está vacío.',
            'cart.min' => 'Debes tener al menos un producto para proceder al pago.',
            'cart.*.quantity.min' => 'La cantidad de los productos debe ser al menos 1.',
        ];
    }
}
