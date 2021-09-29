<?php

namespace Ladumor\LaravelPwa;

use Illuminate\Support\Facades\Facade;

class LaravelPwa extends Facade
{
    /**
     * Get the binding in the IoC container.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravel-pwa';
    }
}