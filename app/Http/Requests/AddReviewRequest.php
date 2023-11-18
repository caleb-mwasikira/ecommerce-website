<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddReviewRequest extends FormRequest
{
    /**
     * The URI that users should be redirected to if validation fails.
     *
     * @var string
     */
    protected $redirect;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->redirect = url()->previous() . "#write_review";

        return [
            "product_id" => "required|exists:products,id",
            "customer_id" => "required|exists:users,id",
            "review_text" => "required|min:5",
            "rating" => "required|digits_between:1,5",
        ];
    }
}
