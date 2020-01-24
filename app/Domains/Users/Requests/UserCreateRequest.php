<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class UserCreateRequest extends FormRequest
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
            'email' => 'required|unique:users',
            'user_name' => 'nullable|unique:users',
            'bio' => 'max:500',
            'address' => 'max:500',
        ];
    }

    public function handle($request)
    {
        $userValues = $request->except('_token');
        $userValues['dob'] = createDMY($request->dob);
        $userValues['uuid'] = Uuid::uuid4();
        $userValues['created_by'] = auth()->id();
        $user = User::create($userValues);
    }
}
