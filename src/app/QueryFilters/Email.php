<?php


namespace App\QueryFilters;


class Email extends Filter
{
    protected function applyFilters($builder)
    {
        return request($this->filterName()) ? $builder->where('email','like','%'.request($this->filterName()).'%') : $builder;
    }
}
