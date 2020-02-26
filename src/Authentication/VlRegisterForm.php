<?php

namespace Vuravel\Library\Authentication;

use App\User;
use Illuminate\Auth\Events\Registered;
use Vuravel\Components\{Input, Password, Columns, Button, Link};

class VlRegisterForm extends \VlForm
{
    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';
    protected $redirectTo = 'verification.notice';
    public static $model = User::class;

    public function components()
    {
        return [
            Input::form('Name')->name('name'),
            //If you wish the create a username, replace with this:
            //Input::form('Name')->name('name')->sluggable('username'),
            Input::form('Email')->name('email'),
            Password::form('Password')->name('password'),
            Columns::form(
                Button::form('Register')->submitsForm(),			 
                Link::form('Already have an account?')
                    ->href('login')
                    ->class('text-gray-600 text-sm italic')
            )
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string'
        ];
    }

}