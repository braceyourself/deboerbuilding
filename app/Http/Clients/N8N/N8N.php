<?php

namespace App\Http\Clients\N8N;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin Request
 */
class N8N extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'n8n';
    }
}