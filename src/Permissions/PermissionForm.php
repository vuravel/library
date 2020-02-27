<?php

namespace Vuravel\Library\Permissions;

use Vuravel\Library\Permissions\Permission;
use Vuravel\Components\{Title, Input, Button};

class PermissionForm extends \VlForm
{
    public static $model = Permission::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            Title::form(($this->creating() ? 'Add a' : 'Edit').' permission'),
            Input::form('Name'),
            Input::form('Guard')->name('guard_name')->default('web'),
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
            'guard_name' => 'required'
        ];
    }

}