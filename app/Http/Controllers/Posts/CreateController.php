<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryTagResource;
use App\Models\Category;
use App\Models\Tag;

class CreateController extends Controller
{

    public function __invoke()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return CategoryTagResource::make();

    }
}
