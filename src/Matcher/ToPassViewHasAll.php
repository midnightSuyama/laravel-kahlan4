<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassViewHasAll extends BaseMatcher
{
    static function match(TestResponse $response, array $bindings)
    {
        static::buildDescription(
            'pass assertViewHasAll().',
            compact('bindings')
        );

        return static::assert(function() use ($response, $bindings) {
            $response->assertViewHasAll($bindings);
        });
    }
}
