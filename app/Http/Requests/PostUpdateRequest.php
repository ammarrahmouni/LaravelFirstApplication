<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'category'      => 'required',
            'image'         => 'nullable|mimes:jpeg,jpg,png|max:2048',

            'title_en'      => 'required',
            'description_en'=> 'required|max:600',
            'title_ar'      => 'required',
            'description_ar'=> 'required|max:600',
            'title_tr'      => 'required',
            'description_tr'=> 'required|max:600',
        ];
    }

    public function messages(){
        return [
            'category.required'         => __('home.ctg_rqd'),
            'image.required'            => __('home.image_rqd'),
            'image.mimes'               => __('home.image_type'),
            'image.max'                 => __('home.image_max'),

            'title_en.required'         => __('home.title_rqd'),
            'description_en.required'   => __('home.description_rqd'),
            'description_en.max'        => __('home.description_max'),
            'title_ar.required'         => __('home.title_rqd'),
            'description_ar.required'   => __('home.description_rqd'),
            'description_ar.max'        => __('home.description_max'),
            'title_tr.required'         => __('home.title_rqd'),
            'description_tr.required'   => __('home.description_rqd'),
            'description_tr.max'        => __('home.description_max'),

        ];
    }
}
