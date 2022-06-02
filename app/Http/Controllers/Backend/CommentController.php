<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Http\Requests\CommentsSearchRequest;
use App\Models\Comment;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class CommentController extends Controller
{
    public function index(CommentsSearchRequest $request): Factory|View|Application
    {
        if ($request->input('search') === null) {
            $comments = Comment::all();
        } else {
            $comments = Comment::search($request);
        }
        return view('admin/comments/index', compact('comments'));
    }

    public function show($id): Factory|View|Application
    {
        $comment = Comment::FindOrFail($id);

        return view('admin/comments/show', compact('comment'));
    }
}
