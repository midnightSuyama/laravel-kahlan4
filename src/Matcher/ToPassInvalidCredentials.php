<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassInvalidCredentials extends BaseMatcher
{
    static function match(TestCase $laravel, array $credentials, $guard=null)
    {
        static::buildDescription(
            'pass assertInvalidCredentials().',
            compact('credentials', 'guard')
        );

        return static::assert(function() use ($laravel, $credentials, $guard) {
            $laravel->assertInvalidCredentials($credentials, $guard);
        });
    }
}
