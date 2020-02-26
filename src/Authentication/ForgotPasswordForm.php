<?php

namespace Vuravel\Library\Authentication;

use Vuravel\Components\{Input, Button};
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordForm extends \VlForm
{
    use SendsPasswordResetEmails;

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

}