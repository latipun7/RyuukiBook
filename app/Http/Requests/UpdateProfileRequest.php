<?php

namespace App\Http\Requests;

class UpdateProfileRequest extends StoreProfileRequest
{
    public function rules()
    {
        $rules = parent::rules();
        $rules['phone'] = 'required|unique:profiles,phone' . $this->route('profile');
        return $rules;
    }
}
