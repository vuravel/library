<?php 

namespace Vuravel\Library\Account;

use Vuravel\Components\{Password, Button};
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Validation\ValidationException;

class ChangePasswordForm extends \VlForm
{
    use ResetsPasswords;

    public function handle($request)
    {
        if (! \Hash::check($request->old_password, \Auth::user()->password))
            throw ValidationException::withMessages([
                'old_password' => __('Sorry. The old password you entered does not match our records.')
            ]);
        
        $this->resetPassword(\Auth::user(), $request->password);
        
        return responseInSuccessModal(__('Password changed successfully!'));
    }

    public function components()
    {
        return [
            Password::form('Old Password')->name('old_password')
                ->comment('You must provide your old password in order to change it.'),
            Password::form('New Password')->name('password'),
            Password::form('Confirm New Password')->name('password_confirmation'),
            Button::form('Change Password')->submitsForm()
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'old_password' => 'required',
            'password' => 'required|confirmed|min:6'
        ];
    }

}