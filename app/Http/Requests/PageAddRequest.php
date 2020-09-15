<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class PageAddRequest extends FormRequest
{
    public $request;
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
        $request = $this->request;
        $input = $request->all();
        return [
            'name' => 'required|max:255',
            'alias' => 'required|max:255|unique:pages,alias,'.$input['id'],
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
