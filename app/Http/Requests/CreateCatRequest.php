<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCatRequest extends FormRequest
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
            'name' => 'required|min:3|max:6',
        ];
    }

    public function messages()
    {
      return [
          'name.required' => 'Vui long nhap ten',
          'name.min' => 'Ten phai lon hon 3 ki tu',
          'name.max' => 'Ten phai nho hon 6 ki tu'
      ];
    }
}
