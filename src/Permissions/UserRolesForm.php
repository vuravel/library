<?php

namespace Vuravel\Library\Permissions;

use App\User;
use Vuravel\Components\{Title, Input, MultiSelect, Button};

class UserRolesForm extends \VlForm
{
    public static $model = User::class;
    public $class = 'p-4';

    public function components()
    {
        return [
            Title::form($this->record()->name.'\'s roles'),
            MultiSelect::form('Roles')->optionsFrom('id', 'name'),
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
            'name' => 'required'
        ];
    }

}