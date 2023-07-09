<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
        $method = $this->method();
        
        if($method == "PUT") {

            return [
                'title' => ['required'],
                'type' => ['required'],
                'color' => ['required'],
                'quantity' => ['required','numeric'],
                'description' => ['required'],
                'price' => ['required','numeric'],
                'picture' => [],
            ];

        } else {
            
            
            return [
                'title' => ['sometimes','required'],
                'type' => ['sometimes','required'],
                'color' => ['sometimes','required'],
                'quantity' => ['sometimes','required','numeric'],
                'description' => ['sometimes','required'],
                'price' => ['sometimes','required','numeric'],
                'picture' => ['sometimes',],
            ];

        }
    }

    public function prepareForValidation()
    {
        $this->merge([
            'supplierable_type'=> 'App\Models\Supplier',
            'supplierable_id'=> 1,
            'supplier_id'=> 1
        ]);
    }
}
