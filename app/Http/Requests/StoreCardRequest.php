<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCardRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'card_number' => 'required|numeric|digits:20|unique:cards,card_number',
            'pin' => 'required|numeric|digits:4',
            'balance' => 'required|numeric|max:100000',
            'activation_date' => 'required|before:expiration_date|after:now',
            'expiration_date' => 'required|date_format:Y-m-d|after:activation_date',
        ];
    }
}
