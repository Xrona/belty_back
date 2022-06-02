<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsSearchRequest;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index(CommentsSearchRequest $request)
    {
        if ($request === null) {
            $comments = Comment::all();
        } else {
            $comments = Comment::search($request);
        }
        return view('admin/comments/index', compact('comments'));
    }

    public function show($id)
    {
        $comment = Comment::FindOrFail($id);

        return view('admin/comments/show', compact('comment'));
    }
}
