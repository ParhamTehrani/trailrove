<?php

namespace App\Repository;

interface LogRepositoryInterface extends BaseRepositoryInterface
{
    public function allLogsWithSearch();
}
