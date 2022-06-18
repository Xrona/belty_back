<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;

class PostController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::all();

        return view('admin/posts/index', compact('posts'));
    }

    public function create(): Factory|View|Application
    {
        return view('admin/posts/create');
    }

    public function store(PostRequest $request): Redirector|Application|RedirectResponse
    {
        $requestData = $request->all();

        $post = Post::create($requestData);


        if ($post && $request->input('image')) {
            $name = explode('/', $requestData['image']);

            $post->url = $requestData['image'];
            $post->path = $name[count($name) - 1];
        }

        $post->update();

        return redirect('posts')->with('flash_message', 'Post added!');
    }

    public function show($id): Factory|View|Application
    {
        $post = Post::findOrFail($id);

        return view('admin/posts/show', compact('post'));
    }

    public function edit($id): Factory|View|Application
    {
        $post = Post::findOrFail($id);

        return view('admin/posts/edit', compact('post'));
    }

    public function update(PostRequest $request, $id): Redirector|Application|RedirectResponse
    {
        $requestData = $request->all();
        $post = Post::findOrFail($id);

        if ($post && $request->input('image')) {
            $name = explode('/', $requestData['image']);

            $requestData['url'] = $requestData['image'];
            $requestData['path'] = $name[count($name) - 1];
        }

        $post->update($requestData);

        return redirect('posts')->with('flash_message', 'Post updated!');
    }

    public function destroy($id): Redirector|Application|RedirectResponse
    {
        Post::destroy($id);

        return redirect('posts')->with('flash_message', 'Post deleted!');
    }
}
