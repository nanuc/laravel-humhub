<?php

namespace Nanuc\LaravelHumHub\Endpoints;

class Authentication extends Endpoint
{
    protected $endpointUrl = 'auth';

    public function login($username, $password)
    {
        $response = $this->post('login', compact('username', 'password'));

        if($response->status() == 400) {
            return false;
        }

        return [
            'token' => $response->json('auth_token'),
            'expired_at' => $response->json('expired_at'),
        ];
    }

    public function currentUser()
    {
        return $this->get('current')->json();
    }
}
