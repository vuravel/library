<?php

namespace Vuravel\Library\Authentication;

use Vuravel\Components\Link;

class LogoutForm extends \VlForm
{
    protected $redirectTo = '/';

    public function handle($request)
    {
        \Auth::guard()->logout();
        //$locale = session('locale');  //for multi-lang sites
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //session( ['locale' => $locale] );  //for multi-lang sites
    }

    public function components()
    {
        return [
            Link::form('Logout')->submitsForm()
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

}