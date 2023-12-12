<?php


namespace App\Business\Admin;


interface NewsServiceInterface
{
    public function getNews();

    public function storeNews($payload);

    public function updateNews($id,$payload);

    public function deleteNews($id);

    public function getChildCategories();
}
