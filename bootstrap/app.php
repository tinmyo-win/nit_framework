<?php

use App\Config\Config;
use App\Core\App;
use App\Core\Container;
use App\Core\Example;
use App\Core\View;
use App\Providers\AppServiceProvider;
use App\Providers\ConfigServiceProvider;
use Dotenv\Dotenv;
use Laminas\Diactoros\Request;
use League\Container\ReflectionContainer;
use Spatie\Ignition\Ignition;

// error_reporting(0);

require '../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$container = Container::getInstance();

$container->delegate(new ReflectionContainer());

// $container->addServiceProvider(new AppServiceProvider());
$container->addServiceProvider(new ConfigServiceProvider());

$config = $container->get(Config::class);

foreach($config->get('app.providers') as $provider) {
    $container->addServiceProvider(new $provider);
}


dd($container->get(Request::class)->getQueryParams());

$app = new App();
$app->run();
