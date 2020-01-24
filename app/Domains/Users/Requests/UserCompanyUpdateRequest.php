<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\CompanyDetail;
use Illuminate\Foundation\Http\FormRequest;

class UserCompanyUpdateRequest extends FormRequest
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

    public function handle($user, $request, $companyDetail)
    {
        $values = $request->except('_token','_method');
        return $user->companyDetails()->find($companyDetail->id)->update($values);
    }
}
