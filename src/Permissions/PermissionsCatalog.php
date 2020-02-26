<?php

namespace Vuravel\Library\Permissions;

use App\Permission;
use Vuravel\Catalog\Cards\TableRow;

class PermissionsCatalog extends \VlCatalog
{
    public $layout = 'Table';
    public $card = TableRow::class;
    public $columns = ['Name', 'Guard name', 'Delete'];

    public function query()
    {
        return new Permission();
    }

    public function card($item)
    {
        return [
            VlEditLink($item->name)
                ->post('vuravel.permission.update', ['id' => $item->id]),
            VlHtml($item->guard_name),
            VlDeleteLink($item)
        ];
    }

    public function top()
    {
        return [
            VlFlexBetween(
                VlTitle('The application\'s permissions'),
                VlAddLink('Add a new permission')->icon('icon-plus')
                    ->post('vuravel.permission.update')
            )
        ];
    }

}