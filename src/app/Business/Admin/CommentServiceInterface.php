<?php


namespace App\Business\Admin;


interface CommentServiceInterface
{
    public function getAll();
    public function changeStatus($id,$status);
    public function getComment($id);
    public function replyComment($parentId,$payload);
}
