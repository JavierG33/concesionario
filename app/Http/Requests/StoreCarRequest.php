<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
            'marca'       => 'required|string|max:100',
            'modelo'      => 'required|string|max:100',
            'anio'        => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'color'       => 'required|string|max:50',
            'precio'      => 'required|numeric|min:0',
            'kilometraje' => 'required|integer|min:0',
            'imagen'      => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'marca.required'       => 'La marca es obligatoria',
            'modelo.required'      => 'El modelo es obligatorio',
            'anio.required'        => 'El año es obligatorio',
            'precio.numeric'       => 'El precio debe ser un número válido',
            'kilometraje.integer'  => 'El kilometraje debe ser un número entero',
        ];
    }
}
