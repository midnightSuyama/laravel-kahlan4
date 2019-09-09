<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestCase;

class ToPassAuthenticatedAs extends BaseMatcher
{
    static function match(TestCase $laravel, $user, $guard=null)
    {
        static::buildDescription(
            'pass assertAuthenticatedAs().',
            compact('user', 'guard')
        );

        return static::assert(function() use ($laravel, $user, $guard) {
            $laravel->assertAuthenticatedAs($user, $guard);
        });
    }
}
