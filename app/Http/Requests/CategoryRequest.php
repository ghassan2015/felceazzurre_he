<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
//            'slug'=>"required|max:190|unique:categories,slug,".$this->id,
            'title_ar' => "required|max:190",
            'title_he'=>"required|max:190",
            'description' => "nullable|max:10000",
            'meta_description' => "nullable|max:10000",
            'image' => 'required',
            'icon_image_blue' => 'required|exists:categories,'.$this->category_id,
            'icon_image_white' => 'required|exists:categories,'.$this->category_id,

        ];
    }
}
