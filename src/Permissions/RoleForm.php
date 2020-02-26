<?php

namespace Vuravel\Library\Permissions;

use Spatie\Permission\Models\Role;

class RoleForm extends \VlForm
{
    public static $model = Role::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            VlTitle('Edit role'),
            VlInput('Name'),
            VlInput('Guard')->name('guard_name')->default('web'),
            VlMultiSelect('Permissions')->optionsFrom('id', 'name'),
            VlButton('Save')->submitsForm()
        ];
    }

}