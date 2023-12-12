<?php


namespace App\Repository;

use App\Models\Page;
use App\QueryFilters\Active;
use App\QueryFilters\Title;
use App\QueryFilters\TitleDe;
use App\QueryFilters\TitleEn;
use Illuminate\Pipeline\Pipeline;

class PageRepository extends BaseRepository implements PageRepositoryInterface
{
    protected $model;
    public function __construct(Page $model)
    {
        $this->model = $model;
    }

    public function getPagesWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Title::class,
                Active::class,
            ])
            ->thenReturn()
            ->paginate(10);
    }

    public function findBySlug($slug, $lang)
    {
        return $this->model->where('active',true)->where('slug',$slug)->firstOrFail();
    }
    public function getActiveSlugs()
    {
        return $this->model->where('active',true)->get();
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
}
