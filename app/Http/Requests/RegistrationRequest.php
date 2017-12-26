<?php

namespace Laraspace\Http\Requests;

class RegistrationRequest extends Request
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
        // dd($this->content);

        return [
            'first_name' => 'required|string|min:3',
            'last_name' => 'required|string|min:2',
            'email' => 'required|email|string|unique:users',
            'phone_number' => 'required|max:15|string|regex:/^\+?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
}