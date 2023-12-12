<?php


namespace App\Repository;

use App\Models\Slider;
use App\QueryFilters\Active;
use App\QueryFilters\Title;
use Illuminate\Pipeline\Pipeline;

class SliderRepository extends BaseRepository implements SliderRepositoryInterface
{
    protected $model;
    public function __construct(Slider $model)
    {
        $this->model = $model;
    }

    public function getSlidersWithSearch()
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
        return $this->model->where('active',true)->get();
    }

    public function create($payload)
    {
        if (@$payload['src']) {
            $payload['src'] = uploadFilePro($payload['src'], 'slider', '/storage/photos/slider')['address'];
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
            $payload['src'] = uploadFilePro($payload['src'],'slider','/storage/photos/slider')['address'];
        }
        return $model->update($payload);
    }
}
