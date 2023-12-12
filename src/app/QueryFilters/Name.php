<?php


namespace App\QueryFilters;


class Name extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('name','like','%'.request($this->filterName()).'%') : $builder;
    }
}
