<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PageAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'alias' => 'required|unique:pages|max:255',
            'text' => 'required'
        ];
    }
    public function messages () {
        return [
            'required' => 'Поле ":attribute" обязательно к заполнению',
            'unique' => 'Поле ":attribute" должно быть уникальным'
        ];
    }
}
