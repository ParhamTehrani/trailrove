<?php


namespace App\QueryFilters;


class Status extends Filter
{
    protected function applyFilters($builder)
    {
        return request($this->filterName()) ? $builder->where('status','like','%'.request($this->filterName()).'%') : $builder;
    }
}
