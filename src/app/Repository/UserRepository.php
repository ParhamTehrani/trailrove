<?php

namespace App\Repository;

use App\Models\User;
use App\QueryFilters\Email;
use App\QueryFilters\FullName;
use App\QueryFilters\Mobile;
use Illuminate\Pipeline\Pipeline;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function getUserListWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Email::class,
                Mobile::class,
            ])
            ->thenReturn()
            ->paginate();
    }

    public function findUserByEmail($email)
    {
        return $this->model->where('email',$email)->firstOrFail();
    }
}
