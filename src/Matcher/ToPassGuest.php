<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassGuest extends BaseMatcher
{
    static function match(TestCase $laravel, $guard=null)
    {
        static::buildDescription(
            'pass assertGuest().',
            compact('guard')
        );

        return static::assert(function() use ($laravel, $guard) {
            $laravel->assertGuest($guard);
        });
    }
}
