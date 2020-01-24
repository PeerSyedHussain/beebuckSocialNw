<?php

namespace App\Domains\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEducationUpdateRequest extends FormRequest
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
            'name' => 'required',
            'start_year' => 'nullable',
            'end_year' => 'nullable|numeric|gte:start_year',
        ];
    }

    public function handle($user, $educationDetails, $request)
    {
        $values = $request->except(['_token','_method']);
        return $user->educationDetails()->find($educationDetails->id)->update($values);
    }
}
