<?php


namespace App\QueryFilters;


class Title extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('title','like','%'.request($this->filterName()).'%') : $builder;
    }
}
