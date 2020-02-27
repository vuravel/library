<?php

namespace Vuravel\Library\Permissions;

use Vuravel\Library\Permissions\Permission;
use Vuravel\Catalog\Cards\TableRow;
use Vuravel\Components\{EditLink, Html, DeleteLink, FlexBetween, Title, AddLink};

class PermissionsCatalog extends \VlCatalog
{
    public $layout = 'Table';
    public $card = TableRow::class;
    public $columns = ['Name', 'Guard name', 'Delete'];

    public function query()
    {
        return new Permission(); //querying all permissions
    }

    public function card($item)
    {
        return [
            EditLink::form($item->name)
                ->post('library.permissions.permission', ['id' => $item->id]),
            Html::form($item->guard_name),
            DeleteLink::form($item)
        ];
    }

    public function top()
    {
        return [
            FlexBetween::form(
                Title::form('The application\'s permissions'),
                AddLink::form('Add a new permission')->icon('icon-plus')
                    ->post('library.permissions.permission')
            )
        ];
    }

}