<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

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
            "email" => 'required|unique:users,email,'.$this->user->id,
            'user_name' => 'nullable|unique:users'.$this->user->id,
            'bio' => 'max:500',
        ];
    }
    public function handle($request, $user)
    {
        $userValues = $request->except(['_token','_method']);
        $userValues['dob'] = createDMY($request->dob);
        return $user = $user->update($userValues);
    }
}
