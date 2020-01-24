<?php

namespace App\Domains\Users\Requests;

use App\Domains\Users\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Ramsey\Uuid\Uuid;

class UserTagCreateRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function handle($user, $request)
    {
        if(!$request->name)
            return $user->tags()->sync([]);
        $tags = $request->name;
        $userTags = collect();
        foreach($tags as $tag)
            $userTags->push(Tag::firstOrCreate([
                'name' => $tag,
                'uuid' => Uuid::uuid4(),
                'created_by' => auth()->id()
            ]));

        return $user->tags()->sync($userTags->pluck('id')->toArray());
    }
}
