<?php

namespace Neckerrman\Like;

use Statamic\Providers\AddonServiceProvider;

class ServiceProvider extends AddonServiceProvider
{
    protected $tags = [
        Tags\Like::class,
    ];

    protected $routes = [
        'actions' => __DIR__.'/../routes/actions.php',
    ];

    protected $stylesheets = [
        __DIR__ . '/../resources/assets/css/style.css',
    ];

    protected $publishables = [
        __DIR__ . '/../resources/assets/images' => 'images',
    ];

    protected $scripts = [
        __DIR__.'/../resources/assets/js/app.js',
    ];

    public function bootAddon()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'like');
    }
}
