<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'type' => ['required'],
            'color' => ['required'],
            'quantity' => ['required','numeric'],
            'description' => ['required'],
            'price' => ['required','numeric'],
            'picture' => [],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'supplierable_type'=> 'App\Models\Supplier',
            'supplierable_id'=> Auth::user()->id,
            'supplier_id'=> Auth::user()->id
        ]);
    }
}
