<?php

namespace App\Repository;


use App\Models\Category;
use App\QueryFilters\Title;
use App\QueryFilters\TitleDe;
use Illuminate\Pipeline\Pipeline;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected $model;
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }


    public function getCategoriesWithChildren()
    {
        return $this->model->with('children')->where('category_id',null)->get();
    }

    public function create($payload)
    {
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        return $this->model->create($payload);
    }


    public function update($id,$payload) : bool
    {
        $model = $this->findById($id);
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        return $model->update($payload);
    }

    public function getCategoryListWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Title::class,
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function getParentCategories()
    {
        return $this->model->whereNull('category_id')->get();
    }

    public function getChildCategories()
    {
        return $this->model->whereNotNull('category_id')->with('children.news')->orderBy('priority')->get();
    }
}
