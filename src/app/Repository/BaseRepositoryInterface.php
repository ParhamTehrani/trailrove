<?php


namespace App\Repository;


interface BaseRepositoryInterface
{
    public function all(array $columns = ['*'] , array $relations = []);

    public function take(int $number,array $columns = ['*'] , array $relations = []);

    public function findById(int $modelId, array $columns = ['*'] , array $relations = [] );

    public function create(array $payload);

    public function update(int $modelId, array $payload);

    public function deleteById(int $modelId) ;
}
