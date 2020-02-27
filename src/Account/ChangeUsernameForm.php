<?php 

namespace Vuravel\Library\Account;

use Vuravel\Components\{Input, Button};

class ChangeUsernameForm extends \VlForm
{
    public function handle($request)
    {
        //todo
    }

    public function components()
    {
        return [
            //todo
        ];
    }

    public function authorize()
    {
        return \Auth::check();
    }

    public function rules()
    {
        return [
            
        ];
    }

}