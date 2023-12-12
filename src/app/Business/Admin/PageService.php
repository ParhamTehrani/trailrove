<?php


namespace App\Business\Admin;


use App\Repository\PageRepositoryInterface;

class PageService implements PageServiceInterface
{
    private $page;
    public function __construct(PageRepositoryInterface $page)
    {
        $this->page = $page;
    }

    public function updatePage($id,$payload)
    {
        return $this->page->update($id,$payload);
    }

    public function getPages()
    {
        return $this->page->getPagesWithSearch();
    }

    public function storePage($payload)
    {
        return $this->page->create($payload);
    }

    public function deletePage($id)
    {
        return $this->page->deleteById($id);
    }
}
