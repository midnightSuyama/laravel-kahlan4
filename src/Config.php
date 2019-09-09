<?php

namespace LaravelKahlan4;

require_once __DIR__ . '/Laravel.php';

use Kahlan\Cli\Kahlan;
use Kahlan\Filter\Filters;
use Kahlan\Matcher;

class Config
{
    static function bootstrap(Kahlan $kahlan)
    {
        putenv('APP_ENV=testing');

        Filters::apply($kahlan, 'namespaces', function($next) {
            $this->autoloader()->addPsr4(__NAMESPACE__ . '\\Matcher\\', __DIR__ . '/Matcher/');

            return $next();
        });

        Filters::apply($kahlan, 'matchers', function($next) {
            foreach (glob(__DIR__ . '/Matcher/To*.php') as $path) {
                $filename = pathinfo($path, PATHINFO_FILENAME);
                Matcher::register(lcfirst($filename), __NAMESPACE__ . '\\Matcher\\' . $filename);
            }

            return $next();
        });

        Filters::apply($kahlan, 'run', function($next) use ($kahlan) {
            $kahlan->suite()->root()->scope()->laravel = new Laravel();
            $kahlan->suite()->root()->scope()->laravelTraits = [];

            $kahlan->suite()->root()->beforeAll(function() use ($kahlan) {
                $kahlan->suite()->root()->scope()->laravel->refreshApplication();
            });

            $kahlan->suite()->root()->beforeEach(function() use ($kahlan) {
                $kahlan->suite()->root()->scope()->laravel->setUp();
            });

            $kahlan->suite()->root()->afterEach(function() use ($kahlan) {
                $kahlan->suite()->root()->scope()->laravel->tearDown();
            });

            return $next();
        });
    }
}
