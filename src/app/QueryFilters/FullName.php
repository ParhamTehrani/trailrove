<?php


namespace App\QueryFilters;


class FullName extends Filter
{
    protected function applyFilters($builder)
    {
        return request($this->filterName()) ? $builder->where('full_name','like','%'.request($this->filterName()).'%') : $builder;
    }
}
