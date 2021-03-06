<?php

namespace Vuravel\Library\Permissions;

use Vuravel\Library\Permissions\Role;
use Vuravel\Components\{Title, Input, MultiSelect, Button};

class RoleForm extends \VlForm
{
    public static $model = Role::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            Title::form(($this->creating() ? 'Add a' : 'Edit').' role'),
            Input::form('Name'),
            Input::form('Guard')->name('guard_name')->default('web'),
            MultiSelect::form('Permissions')->optionsFrom('id', 'name'),
            Button::form('Save')->submitsForm()
        ];
    }

    public function authorize()
    {
        return auth()->user() && auth()->user()->hasRole('admin|super-admin');
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'guard_name' => 'required',
            'permissions' => 'array',
            'permissions.*' => 'exists:permissions,id'
        ];
    }
}