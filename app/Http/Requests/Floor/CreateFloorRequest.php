<?php

namespace App\Http\Requests\Floor;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreateFloorRequest extends FormRequest
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
            "title_ar" => "required|string|min:3|max:32|regex:/^[\p{Arabic}\s]+$/u",
            "title_en" => "required|string|min:3|max:32|regex:/^[A-Za-z\s]+$/",
            "description_ar" => "required|string|min:3|max:255|regex:/^[\p{Arabic}\s]+$/u",
            "description_en" => "required|string|min:3|max:255|regex:/^[A-Za-z\s]+$/",
            "image" => "nullable|image|mimes:png,jpg,jpeg,jif",
        ];
    }

    public function messages()
    {
        return [
            "title_ar.required" => __('validation.title_ar.required'),
            "title_ar.string" => __('validation.title_ar.string'),
            "title_ar.min" => __('validation.title_ar.min'),
            "title_ar.max" => __('validation.title_ar.max'),
            "title_ar.regex" => __('validation.title_ar.regex'),

            "title_en.required" => __('validation.title_en.required'),
            "title_en.string" => __('validation.title_en.string'),
            "title_en.min" => __('validation.title_en.min'),
            "title_en.max" => __('validation.title_en.max'),
            "title_en.regex" => __('validation.title_en.regex'),

            "description_ar.required" => __('validation.description_ar.required'),
            "description_ar.string" => __('validation.description_ar.string'),
            "description_ar.min" => __('validation.description_ar.min'),
            "description_ar.max" => __('validation.description_ar.max'),
            "description_ar.regex" => __('validation.description_ar.regex'),

            "description_en.required" => __('validation.description_en.required'),
            "description_en.string" => __('validation.description_en.string'),
            "description_en.min" => __('validation.description_en.min'),
            "description_en.max" => __('validation.description_en.max'),
            "description_en.regex" => __('validation.description_en.regex'),

            "image.image" => __('validation.image.image'),
            "image.mimes" => __('validation.image.mimes'),
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
            ], 422)
        );
    }
}
