<?php


namespace App\QueryFilters;


class Active extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('active',request($this->filterName())) : $builder;
    }
}
