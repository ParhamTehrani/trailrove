<?php


namespace App\Repository;

use App\Models\Gallery;
use App\QueryFilters\Active;
use App\QueryFilters\Title;
use Illuminate\Pipeline\Pipeline;

class GalleryRepository extends BaseRepository implements GalleryRepositoryInterface
{
    protected $model;
    public function __construct(Gallery $model)
    {
        $this->model = $model;
    }

    public function getGalleryWithSearch()
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
    public function getActive()
    {
        return $this->model->where('active',true)->latest()->get();
    }


    public function create($payload)
    {
        if (@$payload['src']) {
            $payload['src'] = uploadFilePro($payload['src'], 'gallery', '/storage/photos/gallery')['address'];
        }
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        return $this->model->create($payload);
    }

    public function update($modelId,$payload)
    {
        $model = $this->findById($modelId);
        if (@$payload['src']){
            if (file_exists(public_path($model['src'])) && $model['src']){
                unlink(public_path($model['src']));
            }
            $payload['src'] = uploadFilePro($payload['src'],'gallery','/storage/photos/gallery')['address'];
        }
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        return $model->update($payload);
    }

}
