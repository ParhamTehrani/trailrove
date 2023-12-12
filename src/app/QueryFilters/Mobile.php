<?php


namespace App\QueryFilters;


class Mobile extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('mobile','like','%'.request($this->filterName()).'%') : $builder;
    }
}
