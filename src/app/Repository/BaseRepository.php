<?php


namespace App\Repository;

use App\Models\Answer;
use App\Repository;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all(array $columns = ['*'], array $relations = [])
    {
        return $this->model->with($relations)->withCount($relations)->get($columns);
    }

    public function findById(int $modelId, array $columns = ['*'], array $relations = [])
    {
        return $this->model->select($columns)->with($relations)->findOrFail($modelId);
    }

    public function create(array $payload)
    {

        if ($this->model instanceof Answer){
            dd($this->model->create([
                'sda' => 'asd'
            ]));
        }
        $model = $this->model->create($payload);
        return $model->fresh();
    }

    public function update(int $modelId, array $payload)
    {

        $model = $this->findById($modelId);


        return $model->update($payload);
    }

    public function deleteById(int $modelId)
    {
        return $this->findById($modelId)->delete();
    }

    public function take(int $number, array $columns = ['*'], array $relations = [])
    {
        return $this->model->with($relations)->withCount($relations)->select($columns)->take($number)->get();
    }
}
