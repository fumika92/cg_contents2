<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:100',
            'post.body' => 'required|string|max:4000',
            'image' => 'required|image|mimes:JPEG,jpeg,JPG,jpg,PNG,png,MP4,mp4,AVI,avi',
        ];
    }
}
