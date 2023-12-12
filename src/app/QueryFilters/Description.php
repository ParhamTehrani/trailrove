<?php


namespace App\QueryFilters;


class Description extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('description','like','%'.request($this->filterName()).'%') : $builder;
    }
}
