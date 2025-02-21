<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
//        return Auth::user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "name" => "required|min:2",
            "email" => "required|email|unique:employees,email",
            "salary" => "required|integer",
        ];
    }

    function messages(): array{
        return [
                "name.required"=>"Employee must have name",
                "name.min"=>"Employee name must be at least 2 characters",
                "email.required"=>"Employee must have email",
                "email.email"=>"Employee email must be a valid email",
                "email.unique"=>"Employee with this email already exists",
                "salary.required"=>"Employee must have salary",
        ];
    }
}
