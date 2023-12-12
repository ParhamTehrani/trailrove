<?php


namespace App\Repository;


use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{
    protected $model;
    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function paginate()
    {
        return $this->model->paginate(10);
    }


    public function acceptComment($id)
    {
        $model = $this->findById($id)->update(['status' => 'accepted']);
    }

    public function rejectComment($id)
    {
        $model = $this->findById($id)->update(['status' => 'rejected']);
    }


    public function pendComment($id)
    {
        $model = $this->findById($id)->update(['status' => 'pending']);
    }
}
