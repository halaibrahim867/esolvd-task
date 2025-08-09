<?php

namespace App\Repository\Eloquent;

use App\Repository\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepository extends Repository implements RoleRepositoryInterface
{
    protected \Illuminate\Database\Eloquent\Model $model;

    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

}
