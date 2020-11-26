<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPut extends FormRequest
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
            'name' => 'required|min:3|max:50',
            'surname' => 'required|min:3|max:50',
            'email' => 'required|min:5|max:40|unique:users,email,'. $this->route('user')->id // para que el campo email no de error de tener ya el mismo email
        ];
    }
}
