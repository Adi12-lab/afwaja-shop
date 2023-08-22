<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            "category_id" => [
                "required",
                "integer"
            ],
            "name" => [
                "required",
                "string"
            ],
            "slug" => [
                "required",
                "string",
                "max:225"
            ],
            "brand_id" => [
                "required",
                "integer"
            ],
            "small_description" => [
                "required",
                "string",
            ],
            "description" => [
                "required",
                "string",
            ],
            "isNew" => [
                "nullable",
            ],
            "status" => [
                "nullable",
            ],
            "meta_title" => [
                "required",
                "string",
                "max:225"
            ],
            "meta_keyword" => [
                "required",
                "string",
            ],
            "meta_description" => [
                "required",
                "string",
            ],
            "variant_name.*" => [
                "nullable",
                "string",
            ],
            "variant_code.*" => [
                "nullable",
                "string"
            ],
            "selling_price.*" => [
                "nullable",
                "integer",
            ],
            "original_price.*" => [
                "nullable",
                "integer",
            ],
            "quantity.*" => [
                "nullable",
                "integer",
            ],
            "previous_image.*" => [
                "nullable",
                "string"
            ],
            "images" => [
                "nullable",
                // "image|mimes:jpeg,png,jpg"
            ]

        ];
    }
}
