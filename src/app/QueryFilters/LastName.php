<?php


namespace App\QueryFilters;


class LastName extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('last_name','like','%'.request($this->filterName()).'%') : $builder;
    }
}
