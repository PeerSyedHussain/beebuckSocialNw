<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\EducationDetail;
use App\Domains\Users\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class UserEducationCreateRequest extends FormRequest
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

    public function handle(User $user, $request)
    {
        $values = $request->except('_token');
        $values['uuid'] = Uuid::uuid4();
        $values['created_by'] = auth()->id();
        return $user->educationDetails()->create($values);
    }
}
