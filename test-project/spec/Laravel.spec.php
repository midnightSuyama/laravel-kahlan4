<?php

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\WithoutEvents;
use Illuminate\Foundation\Testing\WithFaker;

describe('Laravel', function() {
    it('creates Laravel application', function() {
        $reflection = new ReflectionClass($this->laravel);
        $property = $reflection->getProperty('app');
        $property->setAccessible(true);
        $app = $property->getValue($this->laravel);
        expect($app)->toBeAnInstanceOf(Application::class);
    });

    it('works response test', function() {
        $response = $this->laravel->get('/');
        expect($response)->toPassStatus(200);
    });

    it('works authentication test', function() {
        $user = factory(App\User::class)->make();
        $this->laravel->actingAs($user);
        expect($this->laravel)->toPassAuthenticated();
    });

    context('using RefreshDatabase', function() {
        beforeAll(function() {
            $this->laravel->useTrait(RefreshDatabase::class);
        });

        it('calls refreshDatabase()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->refreshDatabase();
            })->not->toThrow();
        });

        it('works database test', function() {
            $user = factory(App\User::class)->create();
            expect($this->laravel)->toPassDatabaseHas('users', ['email' => $user['email']]);
        });
    });

    context('using DatabaseMigrations', function() {
        beforeAll(function() {
            $this->laravel->useTrait(DatabaseMigrations::class);
        });

        it('calls runDatabaseMigrations()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->runDatabaseMigrations();
            })->not->toThrow();
        });
    });

    context('using DatabaseTransactions', function() {
        beforeAll(function() {
            $this->laravel->useTrait(DatabaseTransactions::class);
        });

        it('calls beginDatabaseTransaction_DatabaseTransactions()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->beginDatabaseTransaction_DatabaseTransactions();
            })->not->toThrow();
        });
    });

    context('using WithoutMiddleware', function() {
        beforeAll(function() {
            $this->laravel->useTrait(WithoutMiddleware::class);
        });

        it('calls disableMiddlewareForAllTests()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->disableMiddlewareForAllTests();
            })->not->toThrow();
        });
    });

    context('using WithoutEvents', function() {
        beforeAll(function() {
            $this->laravel->useTrait(WithoutEvents::class);
        });

        it('calls disableEventsForAllTests()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->disableEventsForAllTests();
            })->not->toThrow();
        });
    });

    context('using WithFaker', function() {
        beforeAll(function() {
            $this->laravel->useTrait(WithFaker::class);
        });

        it('calls setUpFaker()', function() {
            $spy = Mockery::spy($this->laravel);
            $spy->setUpTraits();
            expect(function() use ($spy) {
                $spy->shouldHaveReceived()->setUpFaker();
            })->not->toThrow();
        });
    });

    describe('Environment variable', function() {
        it('is set "APP_ENV=testing"', function() {
            expect(env('APP_ENV'))->toEqual('testing');
        });
    });
});
