<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Nanuc\LaravelHumHub\Models\Space as SpaceModel;

class Space extends Endpoint
{
    protected $values = ['id', 'name', 'guid', 'url', 'description', 'visibility', 'joinPolicy'];

    public function createNewSpace($name, $description = null, $visibility = SpaceModel::VISIBILITY_NONE, $joinPolicy = SpaceModel::JOIN_POLICY_NONE) : SpaceModel
    {
       $values = $this->post(data: compact('name', 'description', 'visibility', 'joinPolicy'))
            ->values($this->values);

        return new SpaceModel(...$values);
    }

    public function getSpaceById($id)
    {
        $values = $this->get($id)->values($this->values);
        return new SpaceModel(...$values);
    }

    public function findAllSpaces()
    {
        return collect($this->get()->json('results'))->map(function($row){
            return new SpaceModel(
                $row['id'],
                $row['guid'],
                $row['name'],
                $row['url'],
                $row['description'],
                $row['visibility'],
                $row['join_policy']
            );
        });
    }

    public function updateExistingSpace($id, $data)
    {
        $values = $this->put($id, $data)
            ->values($this->values);

        return new SpaceModel(...$values);
    }
}
