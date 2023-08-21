<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Session\Store;

class StoreController extends Controller
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $tags = $data['tags_id'];
        unset($data['tags_id']);

        $post = Post::query()->create($data);
        $post->tags()->attach($tags);


        return redirect()->route('post.index');
    }
}
