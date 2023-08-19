<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');

    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        Post::query()->create($data);
        return redirect()->route('post.index');
    }

    public function update(Post $post) {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
        ]);

        $post->update($data);
        return redirect()->route('post.show', $post->id);
    }

    public function show(Post $post) {
       return view('post.show', compact('post'));
    }

    public function edit(Post $post) {
        return view('post.edit', compact('post'));
    }

    public function delete() {
        Post::withTrashed()->find(1)->restore();
    }

    public function destroy(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate() {
        $post = Post::query()->find(1);
        $anotherPost = [
            'title' => 'another firstOrCreate',
            'content' => 'firstOrCreate',
            'image' => 'firstOrCreate',
            'likes' => 1777,
            'is_published' => 1,
        ];

        $myPost = Post::query()->firstOrCreate(['title' => 'another firstOrCreate'],
            $anotherPost);

        dd('finish');
    }
}
