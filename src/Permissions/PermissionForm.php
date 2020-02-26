<?php

namespace Vuravel\Library\Permissions;

use App\Permission;

class PermissionForm extends \VlForm
{
    public static $model = Permission::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            VlTitle('Edit permission'),
            VlInput('Name'),
            VlInput('Guard')->name('guard_name')->default('web'),
            VlButton('Save')->submitsForm()
        ];
    }

    public function authorize()
    {
        return isAdmin();
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'guard_name' => 'required'
        ];
    }

}