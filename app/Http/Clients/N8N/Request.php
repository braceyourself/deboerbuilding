<?php

namespace App\Http\Clients\N8N;

use Illuminate\Http\Client\PendingRequest;

class Request extends PendingRequest
{
    public function __construct()
    {
        parent::__construct();

        $this->baseUrl(config('services.n8n.baseUrl'))
            ->withBasicAuth(config('services.n8n.username'), config('services.n8n.password'));
    }
}