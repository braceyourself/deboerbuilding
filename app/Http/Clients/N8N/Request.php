<?php

namespace App\Http\Clients\N8N;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

class Request extends PendingRequest
{
    public function send(string $method, string $url, array $options = [])
    {
        $data_key = isset($options[$this->bodyFormat])
            ? $this->bodyFormat
            : 'query';

        $data = $options[$data_key];

        if(!app()->isProduction()){
            $data['testing'] = true;
        }

        $options[$data_key] = $data;


        return Http::baseUrl(config('services.n8n.baseUrl'))
            ->withBasicAuth(config('services.n8n.username'), config('services.n8n.password'))
            ->send($method, $url, $options);
    }
}