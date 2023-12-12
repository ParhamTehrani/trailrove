<?php

namespace App\Repository;

use App\Models\Log;
use App\Models\Question;
use App\QueryFilters\AdminId;
use App\QueryFilters\Description;
use Illuminate\Pipeline\Pipeline;

class LogRepository extends BaseRepository implements LogRepositoryInterface
{
    protected $model;
    public function __construct(Log $model)
    {
        parent::__construct($model);
    }

    public function allLogsWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Description::class,
                AdminId::class,
            ])
            ->thenReturn()
            ->with('admin')
            ->latest()
            ->paginate(10);
    }

}
