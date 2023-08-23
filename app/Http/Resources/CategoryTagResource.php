<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryTagResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'categories' => CategoryResource::collection(Category::all()),
            'tags' => TagResource::collection(Tag::all())
        ];
    }
}
