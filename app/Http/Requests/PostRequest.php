<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        $id = is_object($this->post) ? ',' . $this->post->id : null;
        return [
            'name'  => 'required|unique:posts,name' . $id,
            'slug' => 'required|regex:/([\/\w \.-]*)*\/?$/|unique:posts,slug' . $id,
            'content'   => 'required',
            'category_id'   => 'required',
            'seo_title' => 'max:180',
            'seo_description' => 'max:180',
        ];
    }
}
