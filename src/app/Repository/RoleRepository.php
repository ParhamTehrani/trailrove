<?php

namespace App\Repository;


use App\Models\Role;
use App\QueryFilters\Name;
use Illuminate\Pipeline\Pipeline;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected $model;
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }

    public function getRolesWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Name::class,
            ])
            ->thenReturn()
            ->paginate();
    }
}
