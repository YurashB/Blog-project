<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportJsonPlaceholderCommand extends Command
{
    protected $signature = 'import:jsonplaceholder';

    protected $description = 'Get data from JsonPlaceholder';

    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET', 'posts');
        $date = json_decode($response->getBody()->getContents());

        foreach ($date as $item) {
            Post::query()->firstOrCreate([
                'title' => $item->title,
            ], [
                'title' => $item->title,
                'content' => $item->body,
                'category_id' => 2
            ]);
        }

        echo 'Posts from JsonPlaceholder was added to database';

    }
}
