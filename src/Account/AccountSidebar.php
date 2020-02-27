<?php 

namespace Vuravel\Library\Account;

use Vuravel\Components\Link;

class AccountSettingsSidebar extends \VlMenu
{
    protected $placement = 'fixed';

    public function components()
    {
        return [
            Link::form('Change email')->href('account.change-email'),
            Link::form('Change password')->href('account.change-password'),
            Link::form('Change username')->href('account.change-username')
        ];
    }

}