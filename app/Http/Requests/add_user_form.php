<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class add_user_form extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricule' => ['required', 'string', 'max:15', 'min:8'],
            'nom' => ['required', 'string', 'max:255', 'min:3'],
            'prenoms' => ['required', 'string', 'max:255', 'min:3'],
            'tel' => ['required', 'integer', 'max:12', 'min:8'],
            'type' => ['required', 'string'],
            'login' => ['string'],
            'password' => ['string'],
        ];
    }
}
