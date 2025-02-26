<?php

namespace App\Providers;

use App\Config\Config;
use App\Core\Example;
use Laminas\Diactoros\Request;
use Laminas\Diactoros\ServerRequestFactory;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class RequestServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        // Register your services here

        $this->getContainer()->add(Request::class, function() {
            return ServerRequestFactory::fromGlobals(
                $_SERVER,
                $_GET,
                $_POST,
                $_COOKIE,
                $_FILES,
            );
        })->setShared(true);
    }

    public function provides(string $id): bool
    {
        $services = [
            // Add your service identifiers here
            Request::class,
        ];

        return in_array($id, $services);
    }
}
