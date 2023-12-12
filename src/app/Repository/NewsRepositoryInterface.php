<?php

namespace App\Repository;

interface NewsRepositoryInterface extends BaseRepositoryInterface
{
    public function getNewsWithSearch();

    public function getLatestPublish($count);
}
