<?php

namespace App\Http\Controllers\Admin;

use App\Business\Admin\CommentServiceInterface;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    private $comment;
    public function __construct(CommentServiceInterface $comment)
    {
        $this->comment = $comment;
    }

    public function index()
    {
        if (Gate::allows('call_center_index'))
        {
            $comments = $this->comment->getAll();
            return view('Admin.comment.comment-info',compact('comments'));
        }else
        {
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }


    public function edit($id)
    {
        if (Gate::allows('call_center_index'))
        {
            $comment = $this->comment->getComment($id);
            return view('Admin.comment.comment-edit',compact('comment'));
        }else
        {
            return redirect(url('/admin/home'))->with('fail','شما به این قسمت دسترسی ندارید');
        }
    }

    public function changeStatus(Request $request)
    {
        $comment = $this->comment->getComment($request->id);

        if ($comment->status == 'rejected'){
            $txt = 'تایید شده';
            $status = 'accepted';
        }
        if ($comment->status == 'pending'){
            $txt = 'تایید شده';
            $status = 'accepted';
        }
        if ($comment->status == 'accepted'){
            $txt = 'رد شده';
            $status = 'rejected';
        }
        $this->comment->changeStatus($comment->id,$status);

        return [
            'status' => $status == 'accepted',
            'text' => $txt
        ];

    }

}
