<?php


namespace App\Business\Admin;


use App\Repository\GalleryRepositoryInterface;

class GalleryService implements GalleryServiceInterface
{
    private $gallery;
    public function __construct(GalleryRepositoryInterface $gallery)
    {
        $this->gallery = $gallery;
    }

    public function updateGallery($id,$payload)
    {
        return $this->gallery->update($id,$payload);
    }

    public function getGallery()
    {
        return $this->gallery->getGalleryWithSearch();
    }

    public function storeGallery($payload)
    {
        return $this->gallery->create($payload);
    }

    public function deleteGallery($id)
    {
        return $this->gallery->deleteById($id);
    }
}
