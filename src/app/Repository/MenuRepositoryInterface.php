<?php


namespace App\Repository;


interface MenuRepositoryInterface extends BaseRepositoryInterface
{
    public function getMenusWithSearch();
    public function findBySlug($slug,$lang);
    public function getActiveSlugs();

}
