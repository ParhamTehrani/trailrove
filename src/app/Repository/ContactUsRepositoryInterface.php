<?php


namespace App\Repository;


interface ContactUsRepositoryInterface extends BaseRepositoryInterface
{
    public function getByPaginate();
}
