<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Nanuc\LaravelHumHub\Models\ContentContainer;
use Nanuc\LaravelHumHub\Models\Post as PostModel;
use Nanuc\LaravelHumHub\Models\Topic as TopicModel;

class Post extends Endpoint
{
    public function createNewPost(ContentContainer $container, $message)
    {
        $values = $this->post('container/' . $container->id, [
            'data' => [
                'message' => $message,
            ]
        ])->values(['id', 'message', 'content']);

        return new PostModel(...$values);
    }
}
