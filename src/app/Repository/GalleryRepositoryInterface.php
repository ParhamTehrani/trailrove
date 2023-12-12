<?php


namespace App\Repository;


interface GalleryRepositoryInterface extends BaseRepositoryInterface
{
    public function getGalleryWithSearch();
    public function getActive();

}
