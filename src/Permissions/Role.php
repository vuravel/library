<?php

namespace Vuravel\Library\Permissions;

use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    public function deletable()
	{
		return auth()->user() && auth()->user()->hasRole('admin|super-admin');
	}
}
