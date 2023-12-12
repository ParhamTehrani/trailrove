<?php


namespace App\Repository;

use App\Models\Menu;
use App\QueryFilters\Active;
use App\QueryFilters\Title;
use Illuminate\Pipeline\Pipeline;

class MenuRepository extends BaseRepository implements MenuRepositoryInterface
{
    protected $model;
    public function __construct(Menu $model)
    {
        $this->model = $model;
    }

    public function getMenusWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Title::class,
                Active::class,
            ])
            ->thenReturn()
            ->paginate();
    }

    public function findBySlug($slug, $lang)
    {
        return $this->model->where('active',true)->where('slug',$slug)->firstOrFail();
    }
    public function getActiveSlugs()
    {
        return $this->model->where('active',true)->with('page')->orderBy('sort','desc')->get();
    }
}
