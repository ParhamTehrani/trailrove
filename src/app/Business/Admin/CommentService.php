<?php


namespace App\Business\Admin;


use App\Repository\CommentRepositoryInterface;
use App\Repository\NewsRepositoryInterface;

class CommentService implements CommentServiceInterface
{
    private $comment;
    private $news;
    public function __construct(CommentRepositoryInterface $comment,NewsRepositoryInterface $news)
    {
        $this->comment = $comment;
        $this->news = $news;
    }

    public function getAll()
    {
        return $this->comment->paginate();
    }

    public function changeStatus($id, $status)
    {
        switch ($status){
            case 'pending':
                $this->comment->pendComment($id);
                break;
            case 'accepted':
                $this->comment->acceptComment($id);
                break;
            case 'rejected':
                $this->comment->rejectComment($id);
                break;
        }
    }

    public function getComment($id)
    {
        return $this->comment->findById($id);
    }

    public function replyComment($parentId, $payload)
    {
        $news = $this->news->findById($payload['product_id']);
        $news->comment()->create([
            'parent_id' =>$parentId,
            'admin_id' => $payload['admin_id'],
            'message' => $payload['message'],
        ]);
    }
}
