<?php

namespace App\Providers;

use App\Config\Config;
use App\Core\Example;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class AppServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {
        //Only register Ignition in development environment
        if($this->container->get(Config::class)->get('app.debug'))
        {
            Ignition::make()->register();
        }
    }

    public function register(): void
    {
        // Register your services here
    }

    public function provides(string $id): bool
    {
        $services = [
            // Add your service identifiers here
        ];

        return in_array($id, $services);
    }
}