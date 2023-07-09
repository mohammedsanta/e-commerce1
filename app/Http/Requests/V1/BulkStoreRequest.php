<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreRequest extends FormRequest
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
            // '*.id' => ['required'],
            '*.title' => ['required'],
            '*.type' => ['required'],
            '*.color' => ['required'],
            '*.quantity' => ['required','numeric'],
            '*.description' => ['required'],
            '*.price' => ['required','numeric'],
            '*.picture' => [],
            '*.supplierableType' => ['required'],
            '*.supplierableId' => ['required'],
            '*.supplierId' => ['required'],

        ];
    }

    public function prepareForValidation()
    {
        $data = [];

        foreach($this->toArray() as $obj) {

            $obj['supplierable_type'] = $obj['supplierableType'] ?? null;
            $obj['supplierable_id'] = $obj['supplierableId'] ?? null;
            $obj['supplier_id'] = $obj['supplierId'] ?? null;

            $data[] = $obj;
        }

        // dd($data);


        $this->merge($data);
    }
}
