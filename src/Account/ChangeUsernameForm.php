<?php 

namespace Vuravel\Library\Account;

use App\User;
use Vuravel\Components\{Input, Button};
use Illuminate\Validation\ValidationException;

class ChangeUsernameForm extends \VlForm
{
    public function handle($request)
    {
        $this->validateUsername($request);

        //if successful
        $user->username = $request->username;
        $user->save();

        return responseInSuccessModal(__('Username changed successfully!'));
    }

    public function validateUsername($request)
    {
        if(User::where('username', $request->username)->count())
            throw ValidationException::withMessages([
                'username' => __('This username is already taken')
            ]);
    }

    public function components()
    {
        return [
            Input::form('Username')->onInput( function($e){
                $e->submitsForm('validateUsername')->debounce();
            }),
            Button::form('Save')->submitsForm()
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            'username' => 'required|min:3|unique:users,username'
        ];
    }

}