<?php

namespace Nanuc\LaravelHumHub\Endpoints;

use Illuminate\Support\Facades\Http;
use Nanuc\LaravelHumHub\Exceptions\HumHubException;
use Nanuc\LaravelHumHub\HumHubResponse;
use Illuminate\Support\Str;

class Endpoint
{
    protected $token;

    public function __construct($token = null)
    {
        $this->token = $token ?? config('services.humhub.token');
    }

    public function post($url = null, $data = [])
    {
        return $this->runRequest('post', $url, $data);
    }

    public function put($url = null, $data = [])
    {
        return $this->runRequest('put', $url, $data);
    }

    public function get($url)
    {
        return $this->runRequest('get', $url);
    }

    public function runRequest($method, $url, $data = null)
    {
        $response = Http::withToken($this->token)->$method($this->getUrl($url), $data);

        if($response->status() > 299) {
            throw new HumHubException(json_encode($response->json()));
        }

        return new HumHubResponse($response);
    }

    private function getUrl($url = null)
    {
        return config('services.humhub.url') . '/' . $this->getEndpointUrl() . ($url ? '/' . $url : '');
    }

    private function getEndpointUrl()
    {
        return $this->endpointUrl ?? Str::kebab((new \ReflectionClass($this))->getShortName());
    }
}
