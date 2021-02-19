<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
            'title' => 'required|between:1,12',
            'body' => 'required|between:1, 150',
        ];
    }

    public function messages()
    {
        return [
            'title.between' => '12文字以内で入力して下さい。',
            'title.required' => '入力して下さい。',
            'body.between' => '150文字以内で入力して下さい。',
            'body.required' => '入力して下さい。',
        ];
    }
}
