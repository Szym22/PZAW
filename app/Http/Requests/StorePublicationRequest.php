<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublicationRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:2', 'max:50'],
            'content' => ['required', 'string', 'min:10', 'max:500'],
            'author_id' => ['required', 'numeric', 'exists:users,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'author_id.numeric' => 'To pole musi zawierać wartość liczbową',
            'content.string' => 'To pole musi zawierać ciąg znaków',
            'title.required' => 'To pole jest wymagane',
            'author_id.required' => 'To pole jest wymagane',
            'content.required' => 'To pole jest wymagane',
            '*.min' => 'To pole jest za krótkie',
            '*.max' => 'To pole jest za długie'
        ];
    }

}
