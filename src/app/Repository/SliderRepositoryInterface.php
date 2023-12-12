<?php


namespace App\Repository;


interface SliderRepositoryInterface extends BaseRepositoryInterface
{
    public function getSlidersWithSearch();
    public function getActive();
}
