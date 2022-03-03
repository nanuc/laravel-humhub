<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Nanuc\LaravelHumHub\Models\User as UserModel;

class User extends Endpoint
{
    protected $values = ['id', 'guid', 'status', 'username', 'email', 'displayName', 'url'];

    public function findAllUsers()
    {
        return collect($this->get()->json('results'))
            ->map(fn($row) => $this->getUserModelFromData($row));
    }

    public function getUserByEmail($email)
    {
        $values = $this->get('get-by-email?email=' . $email)->json();

        return $this->getUserModelFromData($values);
    }

    public function addNewUser($account, $profile, $password)
    {
        $values = $this->post(data: compact('account', 'profile', 'password'))
            ->values($this->values);

        return new UserModel(...$values);
    }

    public function updateExistingUser($id, $account = null, $profile = null, $password = null)
    {
        $values = $this->put($id, compact('account', 'profile', 'password'))
            ->values($this->values);

        return new UserModel(...$values);
    }

    private function getUserModelFromData($data)
    {
        return new UserModel(
            id: $data['id'],
            guid: $data['guid'],
            status: $data['account']['status'],
            username: $data['account']['username'],
            email: $data['account']['email'],
            displayName: $data['display_name'],
            url: $data['url'],
        );
    }
}
