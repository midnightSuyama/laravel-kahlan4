<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassCredentials extends BaseMatcher
{
    static function match(TestCase $laravel, array $credentials, $guard=null)
    {
        static::buildDescription(
            'pass assertCredentials().',
            compact('credentials', 'guard')
        );

        return static::assert(function() use ($laravel, $credentials, $guard) {
            $laravel->assertCredentials($credentials, $guard);
        });
    }
}
