<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateContact extends FormRequest
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
        $rules = [
            'name' => ['string', 'required', 'min:5'],
            'contact' => ['required', 'digits:9', 'unique:contacts'],
            'email' => ['email:rfc,dns', 'required'],
        ];

        if ($this->method() == 'PUT') {
            $rules['contact'] = ['required', 'digits:9', 'unique:contacts,contact,' . $this->id];
        }

        return $rules;
    }
}
