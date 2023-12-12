<?php

namespace App\Repository;

use App\Models\PermissionCategory;
use App\QueryFilters\Name;
use Illuminate\Pipeline\Pipeline;

class PermissionCategoryRepository extends BaseRepository implements PermissionCategoryRepositoryInterface
{
    protected $model;
    public function __construct(PermissionCategory $model)
    {
        parent::__construct($model);
    }

    public function allPermissionCategoriesWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Name::class,
            ])
            ->thenReturn()
            ->paginate();
    }

    public function deleteById($modelId)
    {
        $model = $this->findById($modelId);
        $model->permission()->delete();
        return $this->model->delete($modelId);
    }
}
