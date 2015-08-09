<?php

// Composer autoloading
require_once __DIR__.'/../vendor/autoload.php';

// Require config
require_once __DIR__.'/config.php';

// Namespaces
use Igorw\Silex\ConfigServiceProvider;
use Knp\Provider\ConsoleServiceProvider;
use Silex\Provider\MonologServiceProvider;

/**
 * Application configuration
 */
$app = new Silex\Application;
$app['debug'] = true;

/**
 * Config Service Provider
 */
$app->register(new ConfigServiceProvider(__DIR__.'/config.php'));

/**
 * Console Service Provider
 */
$app->register(new ConsoleServiceProvider(), array(
    'console.name' => 'ConsoleApp',
    'console.version' => '1.0.0',
    'console.project_directory' => __DIR__.'/..'
));

/**
 * MONOLOG - For logging
 *
 */
$app->register(new MonologServiceProvider(), array(
    'monolog.logfile' => __DIR__.'/../logs/'.date('Y:m:d').'development.log',
    'monolog.name' => 'vinyl',
));

return $app;
