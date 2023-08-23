<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class IndexController extends Controller
{

    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $page = $data['page'] ?? 1;
        $perPage = $data['perPage'] ?? 10;

        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);

        $posts = Post::filter($filter)->paginate($perPage, ['*'], 'page', $page);

        return PostResource::collection($posts);
    }
}
