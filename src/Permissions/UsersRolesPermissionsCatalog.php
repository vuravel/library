<?php

namespace Vuravel\Library\Permissions;

use App\User;
use Vuravel\Catalog\Cards\TableRow;

class UsersRolesPermissionsCatalog extends \VlCatalog
{
    public $layout = 'Table';
    public $card = TableRow::class;
    public $columns = ['id', 'Name', 'Roles', 'Permissions'];

    public function query()
    {
        return User::with('roles', 'permissions');
    }

    public function card($item)
    {
        return [
            VlHtml($item->id),
            VlHtml($item->name),
            VlEditLink($item->getRoleNames()->implode(', ')),
            VlHtml($item->getPermissionNames()->implode(', '))
        ];
    }

}