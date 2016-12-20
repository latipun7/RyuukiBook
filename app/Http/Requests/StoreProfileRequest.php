<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return Auth::check();
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
            'phone'       => 'required|unique:profiles,phone',
            'street'      => 'required',
            'city'        => 'required',
            'province'    => 'required',
            'country'     => 'required',
            'postal_code' => 'required|numeric',
            'photo'       => 'image|max:2048'
        ];
    }
}
