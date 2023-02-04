<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexContactRequest extends FormRequest
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
            'name' => 'nullable',
            'surname' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
            'created_at' => 'nullable',
        ];
    }

    public function allowed()
    {
        return [
            'name',
            'surname',
            'phone',
            'email',
            'created_at'
        ];
    }
}
