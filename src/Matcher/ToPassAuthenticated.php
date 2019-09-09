<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassAuthenticated extends BaseMatcher
{
    static function match(TestCase $laravel, $guard=null)
    {
        static::buildDescription(
            'pass assertAuthenticated().',
            compact('guard')
        );

        return static::assert(function() use ($laravel, $guard) {
            $laravel->assertAuthenticated($guard);
        });
    }
}
