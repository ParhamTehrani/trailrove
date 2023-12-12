<?php


namespace App\Repository;


interface CommentRepositoryInterface extends BaseRepositoryInterface
{
    public function acceptComment($id);
    public function rejectComment($id);
    public function pendComment($id);
    public function paginate();
}
