<?php

namespace Vuravel\Library\Permissions;

use Spatie\Permission\Models\Role;
use Vuravel\Catalog\Cards\TableRow;

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
            VlEditLink($item->name)->post('vuravel.role.update', ['id' => $item->id]),
            VlHtml($item->guard_name),
            VlHtml($item->permissions->implode('name', ', ')),
            VlDeleteLink($item)
        ];
    }

    public function top()
    {
        return [
            VlFlexBetween(
                VlTitle('The application\'s roles'),
                VlAddLink('Add a new role')->icon('icon-plus')
                    ->post('vuravel.role.update')
            )
        ];
    }

}