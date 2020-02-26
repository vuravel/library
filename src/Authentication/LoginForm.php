<?php
namespace Vuravel\Library\Authentication;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Vuravel\Components\{Input, Password, Checkbox, Columns, Button, Link};

class LoginForm extends \VlForm
{
    use AuthenticatesUsers;

    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';
    protected $redirectTo = '/';

    public function handle($request)
    {
        return $this->login($request);
    }

    public function components()
    {
        return [
            Input::form('Email')->name('email'),
            Password::form('Password')->name('password'),
            Checkbox::form('Remember me')->name('remember'),
            Columns::form(
                Button::form('Login')->block()
                	->submitsForm(),
                Link::form('Sign up')->outlined()->block()
                    ->href('register')
            ),
            Link::form('Forgot Your Password?')
            	->block()->class('text-center text-gray-600 text-sm italic')
                ->href('password.request')->inNewTab()                
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|string'
        ];
    }

}