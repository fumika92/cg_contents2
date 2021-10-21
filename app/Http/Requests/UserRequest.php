<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|mimes:JPEG,jpeg,JPG,jpg,PNG,png',
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|string|max:255',
            'user.body' => 'string|max:255',
        ];
    }
}
