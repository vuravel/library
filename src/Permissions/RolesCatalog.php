<?php

namespace Vuravel\Library\Permissions;

use Vuravel\Library\Permissions\Role;
use Vuravel\Catalog\Cards\TableRow;
use Vuravel\Components\{EditLink, Html, DeleteLink, FlexBetween, Title, AddLink};

class RolesCatalog extends \VlCatalog
{
    public $layout = 'Table';
    public $card = TableRow::class;
    public $columns = ['Role', 'Guard', 'Associated permissions', 'Delete'];

    public function query()
    {
        return new Role();
    }

    public function card($item)
    {
        return [
            EditLink::form($item->name)
                ->post('library.permissions.role', ['id' => $item->id]),
            Html::form($item->guard_name),
            Html::form($item->permissions->implode('name', ', ')),
            DeleteLink::form($item)
        ];
    }

    public function top()
    {
        return [
            FlexBetween::form(
                Title::form('The application\'s roles'),
                AddLink::form('Add a new role')->icon('icon-plus')
                    ->post('library.permissions.role')
            )
        ];
    }

}