<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = !is_null($this->user) ? ',' . $this->user : null;
//        $pass = !is_null($this->password) ? '|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{6,}$/|min:6' : null;
        return [
            'name' => 'required|min:6|max:20|regex:/^[a-zA-ZđàáảãạăằắẳẵặâầấẩẫậèéẻẽẹêềếểễệìíỉĩịòóỏõọôồốổỗộơờớởỡợùúủũụưừứửữựỳýỷỹỵĐÀÁẢÃẠĂẰẮẲẴẶÂẦẤẨẪẬÈÉẺẼẸÊỀẾỂỄỆÌÍỈĨỊÒÓỎÕỌÔỒỐỔỖỘƠỜỚỞỠỢÙÚỦŨỤƯỪỨỬỮỰỲÝỶỸỴ\s]{3,16}$/',
            'email' => 'required|unique:users,email' . $id,
            'password' => 'max:20|min:6',
            're-password' => 'same:password',
        ];
    }
}
