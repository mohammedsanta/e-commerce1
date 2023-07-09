<?php

namespace App\Http\Requests;

use App\Models\Admin;
use App\Models\Profile;
use Illuminate\Foundation\Http\FormRequest;

class AdminRegisterRequest extends FormRequest
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
            'name' => ['required'],
            'email' => ['required'],
            'picture' => ['required'],
            'mobile' => ['required'],
            'country' => ['required'],
            'address' => ['required'],
            'picture' => ['required'],
            'password' => ['required'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id' => 1,
            'profileable_type' => 'App\Models\Profile',
            'profileable_id' => Profile::all()->count() + 1,
            'owner_type' => 'App\Models\Admin',
            'owner_id' => Admin::all()->count() + 1,
        ]);
    }
}
