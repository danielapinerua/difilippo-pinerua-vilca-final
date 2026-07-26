<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class ProductRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
            'categories' => 'required|array|min:1',
            'categories.*' => 'required|integer|exists:categories,id|distinct',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser texto.',
            'name.max' => 'El nombre no puede exceder 255 caracteres.',
            'description.string' => 'La descripción debe ser texto.',
            'price.required' => 'El precio es obligatorio.',
            'price.numeric' => 'El precio debe ser un número.',
            'price.min' => 'El precio no puede ser negativo.',
            'stock.required' => 'El stock es obligatorio.',
            'stock.integer' => 'El stock debe ser un número entero.',
            'stock.min' => 'El stock no puede ser negativo.',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser jpeg, png, jpg o webp.',
            'image.max' => 'La imagen no puede exceder 10MB.',
            'categories.required' => 'Debes seleccionar al menos una categoría.',
            'categories.array' => 'Formato de categoría inválido.',
            'categories.min' => 'Debes seleccionar al menos una categoría.',
            'categories.*.required' => 'La categoría es obligatoria.',
            'categories.*.integer' => 'Formato de categoría inválido.',
            'categories.*.exists' => 'La categoría seleccionada no existe.',
            'categories.*.distinct' => 'Las categorías no pueden repetirse.',
        ];
    }
}
