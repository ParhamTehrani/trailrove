<?php


namespace App\Business\Admin;


use App\Repository\CategoryRepositoryInterface;
use App\Repository\NewsRepositoryInterface;

class NewsService implements NewsServiceInterface
{
    private $news;
    private $category;
    public function __construct(NewsRepositoryInterface $news,CategoryRepositoryInterface $category)
    {
        $this->news = $news;
        $this->category = $category;
    }

    public function updateNews($id,$payload)
    {
        return $this->news->update($id,$payload);
    }

    public function getNews()
    {
        return $this->news->getNewsWithSearch();
    }

    public function storeNews($payload)
    {
        return $this->news->create($payload);
    }

    public function deleteNews($id)
    {
        return $this->news->deleteById($id);
    }

    public function getChildCategories()
    {
        return $this->category->getChildCategories();
    }
}
