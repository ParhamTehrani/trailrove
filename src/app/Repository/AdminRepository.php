<?php

namespace App\Repository;

use App\Models\Admin;
use App\QueryFilters\Email;
use App\QueryFilters\FullName;
use Illuminate\Pipeline\Pipeline;

class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    protected $model;
    public function __construct(Admin $model)
    {
        parent::__construct($model);
    }

    public function allAdminsWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                FullName::class,
                Email::class,
            ])
            ->thenReturn()
            ->paginate(10);
    }


}
