<?php


namespace App\QueryFilters;


class AdminId extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('admin_id',request($this->filterName())) : $builder;
    }
}
