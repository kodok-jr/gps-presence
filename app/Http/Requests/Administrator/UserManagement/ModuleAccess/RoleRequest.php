<?php

namespace App\Http\Requests\Administrator\UserManagement\ModuleAccess;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255', Rule::unique('roles', 'name')->ignore($this->role, 'uuid')],
            'slug' => ['required', 'max:255', Rule::unique('roles', 'slug')->ignore($this->role, 'uuid')],
            'description' => ['nullable', 'max:255']
        ];
    }
}
