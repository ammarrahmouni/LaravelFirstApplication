<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:30',
            'address' => 'required|string|max:255|min:15',
        ];
    }

    public function messages(){
        return [
            'name.required'     => __('login.name_required'),
            'name.max'          => __('login.name_max'),
            'phone.required'    => __('login.phone_required'),
            'phone.max'         => __('login.phone_max'),
            'address.required'  => __('login.address_required'),
            'address.max'       => __('login.address_max'),
            'address.min'       => __('login.address_min'),
        ];
    }
}
