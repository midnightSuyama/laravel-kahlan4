<?php

namespace LaravelKahlan4;

use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithFaker;
use Kahlan\Suite;

class Laravel extends TestCase
{
    use RefreshDatabase,
        DatabaseMigrations,
        DatabaseTransactions,
        WithoutMiddleware,
        WithoutEvents,
        WithFaker {
            RefreshDatabase::beginDatabaseTransaction insteadof DatabaseTransactions;
            RefreshDatabase::connectionsToTransact insteadof DatabaseTransactions;
            DatabaseTransactions::beginDatabaseTransaction as beginDatabaseTransaction_DatabaseTransactions;
    }

    function __call($name, $arguments)
    {
        return call_user_func_array([$this, $name], $arguments);
    }

    function createApplication()
    {
        $app = require 'bootstrap/app.php';
        $app->make(Kernel::class)->bootstrap();
        return $app;
    }

    protected function setUpTraits()
    {
        $uses = Suite::current()->scope()->laravelTraits;

        if (in_array(RefreshDatabase::class, $uses)) {
            $this->refreshDatabase();
        }

        if (in_array(DatabaseMigrations::class, $uses)) {
            $this->runDatabaseMigrations();
        }

        if (in_array(DatabaseTransactions::class, $uses)) {
            $this->beginDatabaseTransaction_DatabaseTransactions();
        }

        if (in_array(WithoutMiddleware::class, $uses)) {
            $this->disableMiddlewareForAllTests();
        }

        if (in_array(WithoutEvents::class, $uses)) {
            $this->disableEventsForAllTests();
        }

        if (in_array(WithFaker::class, $uses)) {
            $this->setUpFaker();
        }

        return array_flip(class_uses_recursive(static::class));
    }

    function useTrait($class)
    {
        $uses = Suite::current()->scope()->laravelTraits;

        if (is_array($class)) {
            $uses = array_merge($uses, $class);
        } else {
            $uses[] = $class;
        }

        Suite::current()->scope()->laravelTraits = array_unique($uses);
    }
}
