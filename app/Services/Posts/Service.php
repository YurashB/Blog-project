<?php

namespace App\Services\Posts;

use App\Models\Post;

class Service
{
    public function store($data)
    {
        $tags = $data['tags_id'];
        unset($data['tags_id']);

        $post = Post::query()->create($data);
        $post->tags()->attach($tags);
    }

    public function update($post, $data)
    {
        $tags = $data['tags_id'];
        unset($data['tags_id']);

        $post->update($data);
        $post->tags()->sync($tags);
    }
}
