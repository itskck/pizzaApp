<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PizzaAddRequest extends FormRequest
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
            'addNazwa' => 'string | min:1 | max:1000',
            'addCenaMala' => 'regex:/^[0-9]{1,}([.][0-9]{1,2})?$/',
            'addCenaSrednia' => 'regex:/^[0-9]{1,}([.][0-9]{1,2})?$/',
            'addCenaDuza' => 'regex:/^[0-9]{1,}([.][0-9]{1,2})?$/',
            'addOpis' => 'string | min:1 | max:1000',
            'addKategoria' => 'string | min:1 | max:1000'
        ];
    }
}
