<?php

namespace App\Repository\Eloquent;

use App\Repository\PermissionRepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepository extends Repository implements PermissionRepositoryInterface
{
    protected \Illuminate\Database\Eloquent\Model $model;

    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
