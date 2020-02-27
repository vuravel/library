<?php

namespace Vuravel\Library\Permissions;

use Spatie\Permission\Models\Permission as SpatiePermission;

class Permission extends SpatiePermission
{
    public function deletable()
	{
		return auth()->user() && auth()->user()->hasRole('admin|super-admin');
	}
}
