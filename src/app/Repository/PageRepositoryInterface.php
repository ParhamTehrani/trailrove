<?php


namespace App\Repository;


interface PageRepositoryInterface extends BaseRepositoryInterface
{
    public function getPagesWithSearch();
    public function findBySlug($slug,$lang);
    public function getActiveSlugs();

}
