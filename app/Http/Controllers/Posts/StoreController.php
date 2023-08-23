<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Faker\Provider\Base;
use Illuminate\Session\Store;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $post = $this->service->store($data);

        return PostResource::make($post);
    }
}
