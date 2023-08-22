<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Console\View\Components\Task;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));

    }

    public function store()
    {
        $data = \request()->validate([
            'title' => 'required|string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags_id' => ''
        ]);
        $tags = $data['tags_id'];
        unset($data['tags_id']);

        $post = Post::query()->create($data);
        $post->tags()->attach($tags);


        return redirect()->route('post.index');
    }

    public function update(Post $post)
    {
        $data = \request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags_id' => ''
        ]);
        $tags = $data['tags_id'];
        unset($data['tags_id']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function delete()
    {
        Post::withTrashed()->find(1)->restore();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function firstOrCreate()
    {
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
