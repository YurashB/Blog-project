<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class CreateController extends BaseController
{

    public function __invoke(FilterRequest $request)
    {

        $tags = Tag::all();
        $categories = Category::all();

        return view('admin.post.create', compact('tags', 'categories'));
    }
}
