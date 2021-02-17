<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|max:15',
            'body' => 'required|max:1000',
            'user_id' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => 'タイトルを入力してください',
            'title.max' => '15文字以内で入力して下さい',
            'body.required' => '本文を入れてください',
            'body.max' => '1000文字以内で入力して下さい。'
        ];
    }
}
