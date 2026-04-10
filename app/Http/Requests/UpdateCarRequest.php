<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCarRequest extends StoreCarRequest
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
        $rules = parent::rules();

        $rules['marca']       = 'sometimes|required|string|max:100';
        $rules['modelo']      = 'sometimes|required|string|max:100';
        $rules['anio']        = 'sometimes|required|integer|min:1900|max:' . (date('Y') + 1);
        $rules['color']       = 'sometimes|required|string|max:50';
        $rules['precio']      = 'sometimes|required|numeric|min:0';
        $rules['kilometraje'] = 'sometimes|required|integer|min:0';
        $rules['imagen']      = 'nullable|image|mimes:jpeg,png,jpg|max:2048';

        return $rules;
    }
}
