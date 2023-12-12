<?php

namespace App\Repository;

use App\Models\News;
use App\Models\Tag;
use App\QueryFilters\Email;
use App\QueryFilters\FullName;
use App\QueryFilters\Status;
use App\QueryFilters\Title;
use Illuminate\Pipeline\Pipeline;

class NewsRepository extends BaseRepository implements NewsRepositoryInterface
{
    protected $model;
    public function __construct(News $model)
    {
        parent::__construct($model);
    }

    public function getNewsWithSearch()
    {
        return app(Pipeline::class)
            ->send($this->model::query())
            ->through([
                Title::class,
                Status::class,
            ])
            ->thenReturn()
            ->latest()
            ->paginate(10);
    }

    public function create($payload)
    {
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        if (@$payload['thumbnail']){
            $payload['thumbnail'] = uploadFilePro($payload['thumbnail'],'news','/storage/photos/news')['address'];
        }
        if (@$payload['faq1']){
            $faq1 = $payload['faq1'];
            $faq1Ans = $payload['faq1Ans'];
            unset($payload['faq1']);
            unset($payload['faq1Ans']);
        }
        if (@$payload['faq2']){
            $faq2 = $payload['faq2'];
            $faq2Ans = $payload['faq2Ans'];
            unset($payload['faq2']);
            unset($payload['faq2Ans']);
        }
        if (@$payload['faq3']){
            $faq3 = $payload['faq3'];
            $faq3Ans = $payload['faq3Ans'];
            unset($payload['faq3']);
            unset($payload['faq3Ans']);
        }
        if (@$payload['faq4']){
            $faq4 = $payload['faq4'];
            $faq4Ans = $payload['faq4Ans'];
            unset($payload['faq4']);
            unset($payload['faq4Ans']);
        }
        if (@$payload['tags'] && count($payload['tags']) > 0){
            $tags = $payload['tags'];
            unset($payload['tags']);
        }
        $payload = array_filter($payload);
        $news = $this->model->create($payload);

        if (@$tags && count(@$tags) > 0){
            $tagID = [];
            foreach ($tags as $tag){
                $tagID[] = Tag::firstOrCreate(['title' => $tag])->id;
            }
            $news->tag()->sync($tagID);
        }

        if (@$faq1){
            $news->faqable()->create([
                'question' => @$faq1,
                'answer' => @$faq1Ans,
            ]);
        }
        if (@$faq2){
            $news->faqable()->create([
                'question' => @$faq2,
                'answer' => @$faq2Ans,
            ]);
        }
        if (@$faq3){
            $news->faqable()->create([
                'question' => @$faq3,
                'answer' => @$faq3Ans,
            ]);
        }
        if (@$faq4){
            $news->faqable()->create([
                'question' => @$faq4,
                'answer' => @$faq4Ans,
            ]);
        }
    }

    public function update($id,$payload)
    {
        $model = $this->findById($id);
        if (@$payload['thumbnail']){
            if (file_exists(public_path($model['thumbnail'])) && $model['thumbnail']){
                unlink(public_path($model['thumbnail']));
            }
            $payload['thumbnail'] = uploadFilePro($payload['thumbnail'],'news','/storage/photos/news')['address'];
        }
        if (@$payload['title']){
            $payload['slug'] = make_slug($payload['title']);
        }
        if (@$payload['faq1']){
            $faq1 = $payload['faq1'];
            $faq1Ans = $payload['faq1Ans'];
            unset($payload['faq1']);
            unset($payload['faq1Ans']);
        }
        if (@$payload['faq2']){
            $faq2 = $payload['faq2'];
            $faq2Ans = $payload['faq2Ans'];
            unset($payload['faq2']);
            unset($payload['faq2Ans']);
        }
        if (@$payload['faq3']){
            $faq3 = $payload['faq3'];
            $faq3Ans = $payload['faq3Ans'];
            unset($payload['faq3']);
            unset($payload['faq3Ans']);
        }
        if (@$payload['faq4']){
            $faq4 = $payload['faq4'];
            $faq4Ans = $payload['faq4Ans'];
            unset($payload['faq4']);
            unset($payload['faq4Ans']);
        }
        if (@$payload['tags'] && count($payload['tags']) > 0){
            $tags = $payload['tags'];
            unset($payload['tags']);
        }

        $payload = array_filter($payload);
        $model->faqable()->delete();
        $model->tag()->detach();
        $model->update($payload);
        if (@$tags && count(@$tags) > 0){
            $tagID = [];
            foreach ($tags as $tag){
                $tagID[] = Tag::firstOrCreate(['title' => $tag])->id;
            }
            $model->tag()->sync($tagID);
        }
        if (@$faq1){
            $model->faqable()->create([
                'question' => @$faq1,
                'answer' => @$faq1Ans,
            ]);
        }
        if (@$faq2){
            $model->faqable()->create([
                'question' => @$faq2,
                'answer' => @$faq2Ans,
            ]);
        }
        if (@$faq3){
            $model->faqable()->create([
                'question' => @$faq3,
                'answer' => @$faq3Ans,
            ]);
        }
        if (@$faq4){
            $model->faqable()->create([
                'question' => @$faq4,
                'answer' => @$faq4Ans,
            ]);
        }
        return $model;


    }

    public function deleteById($id)
    {
        $model = $this->findById($id);
        $model->faqable()->delete();
        $model->tag()->detach();
        return $model->delete();
    }

    public function getLatestPublish($count)
    {
        return $this->model->where('status','publish')->latest()->take($count)->get();
    }

    public function getMostPublish($count)
    {
        return $this->model->where('status','publish')->orderBy('seen','desc')->take($count)->get();
    }
}
