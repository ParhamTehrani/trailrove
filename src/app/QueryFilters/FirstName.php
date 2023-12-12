<?php


namespace App\QueryFilters;


class FirstName extends Filter
{
    protected function applyFilters($builder)
    {
        return $this->filterName() ? $builder->where('first_name','like','%'.request($this->filterName()).'%') : $builder;
    }
}
