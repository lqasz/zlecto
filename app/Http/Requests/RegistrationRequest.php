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
        return [
            'imie' => 'required|string|max:255|min:3',
            'nazwisko' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'nr_telefonu' => 'required|regex:/^\+?([0-9]{3})[- ]?([0-9]{3})[- ]?([0-9]{3})$/',
            'haslo' => 'required|string|min:8|same:ponownie_haslo',
        ];
    }
}