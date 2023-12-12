<?php


namespace App\Business\Admin;


interface GalleryServiceInterface
{
    public function getGallery();

    public function storeGallery($payload);

    public function updateGallery($id,$payload);

    public function deleteGallery($id);
}
