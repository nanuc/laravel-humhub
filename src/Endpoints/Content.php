<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Nanuc\LaravelHumHub\Models\ContentContainer;

class Content extends Endpoint
{
    protected $values = ['id', 'name', 'guid', 'url', 'description', 'visibility', 'joinPolicy'];

    public function findAllContentContainer()
    {
        return $this->get('container')->collect('results')
            ->map(function($container) {
                return new ContentContainer($container['id'], $container['guid']);
            });
    }
}
