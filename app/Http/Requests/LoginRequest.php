<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
   public function validation()
    {
        $this->merge([
            'password' => Password::defaults()
                ->length(6) 
                ->requireNumeric() 
                ->requireUppercase(3) 
                ->requireLowercase() 
                ->getRules(), 
        ]);
    }
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // Określ reguły walidacji dla danych wejściowych
        return [
            'login' => 'required|string',
            'password' => 'required|string',
            'remember_me' => 'nullable|boolean',
        ];
    }
}
