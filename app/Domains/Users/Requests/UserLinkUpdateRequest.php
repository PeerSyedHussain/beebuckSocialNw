<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\Link;
use Illuminate\Foundation\Http\FormRequest;

class UserLinkUpdateRequest extends FormRequest
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
            'type' => 'required',
            'value' => 'required|url'
        ];
    }

    public function handle($user, $request, $link)
    {
        $values = $request->except(['_token','_method']);
        return $user->links()->find($link->id)->update($values);
    }
}
