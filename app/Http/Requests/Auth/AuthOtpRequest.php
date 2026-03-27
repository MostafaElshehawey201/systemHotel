<?php

namespace App\Http\Requests\Auth;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthOtpRequest extends FormRequest
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
            "otp" => "required|digits:6|exists:otps,otp"
        ];
    }

    public function messages()
    {
        return [
            "otp.required" => __('validation.otp.required'),
            "otp.digits" => __('validation.otp.digits'),
            "otp.exists" => __('validation.otp.exists'),
        ];
    }
    public function failedValidation(Validator $validator)
    {
        $errors = [];
        foreach ($validator->errors()->getMessages() as $key => $value) {
            $errors[$key] = $value;
        }
        throw new HttpResponseException(
            response()->json([
                "success" => false,
                "data" => null,
                "errors" => $errors,
            ])
        );
    }
}
