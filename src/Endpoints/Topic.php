<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Nanuc\LaravelHumHub\Models\ContentContainer;
use Nanuc\LaravelHumHub\Models\Topic as TopicModel;

class Topic extends Endpoint
{
    public function createNewTopic(ContentContainer $container, $name)
    {
        $values = $this->post('container/' . $container->id, compact('name'))
            ->values(['id', 'name']);

        return new TopicModel(...$values);
    }
}
