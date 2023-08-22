<?php

namespace App\Http\Controllers\Admin\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Faker\Provider\Base;
use Illuminate\Session\Store;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
