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
        $id = !is_null($this->category) ? ',' . $this->category->id : null;
        return [
            'name' => 'required|unique:categories,name' . $id,
            'slug' => 'regex:/([\/\w \.-]*)*\/?$/|unique:categories,slug' . $id,
        ];
    }
}
