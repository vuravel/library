<?php

namespace Vuravel\Library\Authentication;

use Vuravel\Components\{Input, Button};
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordForm extends \VlForm
{
    use SendsPasswordResetEmails;
    
    public $class = 'p-4 mx-auto';
    public $style = 'max-width:350px';

    public function handle($request)
    {
        return $this->sendResetLinkEmail($request);
    }

    public function components()
    {
        return [
            Input::form('Email')->name('email'),
            Button::form('Send password reset instructions')->submitsForm()
        ];
    }

    public function authorize()
    {
        return \Auth::guest();
    }

    public function rules()
    {
        return [
            'email' => 'required|email'
        ];
    }

}