<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::query()->where('id', ">", 4)->get();
        dd($post);
    }

    public function create()
    {
        $postArr = [
            [
                'title' => 'title of post from phpstorm',
                'content' => 'some content',
                'image' => 'some image',
                'likes' => 223,
                'is_published' => 1,
            ],
            [
                'title' => 'title of post from phpstorm 2',
                'content' => 'some content 2',
                'image' => 'some image 2',
                'likes' => 12,
                'is_published' => 1,
            ],
        ];

        foreach ($postArr as $post) {
            dump($post);
           Post::query()->create($post);
        }


    }

    public function update() {
        $post = Post::query()->find(11);
        $post->update([
            'title' => 'updated',
            'content' => 'updated',
            'image' => 'updated',
            'likes' => 1,
            'is_published' => 0,
        ]);

        dd('updated');
    }

    public function delete() {
        Post::query()->find(1)->delete();
        Post::withTrashed()->find(1)->restore();
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
