<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
{
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
        return [
            
		'email'=>'required|email',
		'password'=>'required|min:6|max:16'
		
        ];
    }
	
	 public function messages()
    {
        return [
		
		'email.email'=>'Неправильный email',
		
		'password.min'=>'Пароль минимум 6 символов',
		'password.max'=>'Пароль максимум 16 символов'
        ];
    }
}
