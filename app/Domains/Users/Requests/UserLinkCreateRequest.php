<?php

namespace App\Domains\Users\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class UserLinkCreateRequest extends FormRequest
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

    public function handle($user, $request)
    {
        $values = $request->except('_token');
        $values['uuid'] = Uuid::uuid4();
        $values['created_by'] = auth()->id();
        return $user->links()->create($values);
    }
}
