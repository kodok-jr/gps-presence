<?php

namespace App\Http\Requests\Administrator\UserManagement\Accounts;

use Illuminate\Validation\Rule;

class AdminUpdateRequest extends AdminStoreRequest
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
        parent::rules();

        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($this->admin, 'uuid')],
            'password' => ['nullable'],
            'role_id' => ['required', 'exists:roles,id']
        ];
    }
}
