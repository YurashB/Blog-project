<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;

class StoreController extends Controller
{

    public function __invoke()
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
}
