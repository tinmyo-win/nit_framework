<?php

namespace App\Providers;

use App\Config\Config;
use App\Core\Container;
use App\Core\Example;
use League\Container\ServiceProvider\AbstractServiceProvider;
use League\Container\ServiceProvider\BootableServiceProviderInterface;
use Spatie\Ignition\Ignition;

class ConfigServiceProvider extends AbstractServiceProvider implements BootableServiceProviderInterface
{
    public function boot(): void
    {

    }

    public function register(): void
    {
        // Register your services here
        Container::getInstance()->add(Config::class, function () {
            $config = new Config();

            return $this->mergeConfigFromFiles($config);
        })->setShared(true);
    }

    protected function mergeConfigFromFiles(Config $config): Config
    {
        $path = __DIR__ . '/../../config';

        foreach (array_diff(scandir($path), ['.', '..'])  as $configFile) {
            $config->merge([
                explode('.', $configFile)[0] => require($path . '/' . $configFile)
            ]);
        }

        return $config;
    }

    public function provides(string $id): bool
    {
        $services = [
            Config::class,
            // Add your service identifiers here
        ];

        return in_array($id, $services);
    }
}
