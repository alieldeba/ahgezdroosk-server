<?php

namespace App\Http\Requests\Profiles;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['nullable', 'string', 'max:255'],
            'username' => [
                'nullable',
                'string',
                'max:20',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)
            ],
            'avatar' => ['nullable', 'image', 'mimes:png,jpg,bmp,jpeg', 'max:1024'],
            'phone' => [
                'required',
                'numeric',
                'digits:11',
                'regex:/^(01)(0|1|2|5)[0-9]+$/',
                Rule::unique('users', 'phone')->ignore(Auth::user()->id)
            ],
            'grade_id' => 'nullable|integer|exists:grades,id'
        ];
    }
}
