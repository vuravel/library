<?php 

namespace Vuravel\Library\Account;

use Vuravel\Components\{Input, Button};

class ChangeEmailForm extends \VlForm
{
    public function handle($request)
    {
        $user = auth()->user();
        $user->email = $request->email;
        $user->email_verified_at = null;
        $user->save();
        
        $user->sendEmailVerificationNotification();
        
        return redirect()->route('verification.notice');
    }

    public function components()
    {
        return [
            Input::form('Email')->name('email')
                ->default(auth()->user()->email)
                ->comment('You will be asked to reverify your email after you change it.'),
            Button::form('Change email')->submitsForm()
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email'
        ];
    }

}