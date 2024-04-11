<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNotedeFraisRequest extends FormRequest
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
           // 'date_depense' =>'required|date',
           // 'montant' =>'required|numeric',
           // 'preuve' =>'required|file',
            //'user_id' =>'required|exists:users_id'
        ];
    }
}
