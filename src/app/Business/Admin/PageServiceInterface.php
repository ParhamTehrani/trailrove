<?php


namespace App\Business\Admin;


interface PageServiceInterface
{
    public function getPages();

    public function storePage($payload);

    public function updatePage($id,$payload);

    public function deletePage($id);
}
