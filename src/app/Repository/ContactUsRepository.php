<?php


namespace App\Repository;


use App\Models\ContactUs;
use App\QueryFilters\Email;
use App\QueryFilters\FirstName;
use App\QueryFilters\FullName;
use App\QueryFilters\LastName;
use App\QueryFilters\Mobile;
use Illuminate\Pipeline\Pipeline;

class ContactUsRepository extends BaseRepository implements ContactUsRepositoryInterface
{
    protected $model;
    public function __construct(ContactUs $model)
    {
        $this->model = $model;
    }

    public function getByPaginate()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                FirstName::class,
                LastName::class,
                Email::class,
            ])
            ->thenReturn()
            ->paginate(10);
    }
}
