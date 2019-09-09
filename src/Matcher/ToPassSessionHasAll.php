<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassSessionHasAll extends BaseMatcher
{
    static function match(TestResponse $response, array $bindings)
    {
        static::buildDescription(
            'pass assertSessionHasAll().',
            compact('bindings')
        );

        return static::assert(function() use ($response, $bindings) {
            $response->assertSessionHasAll($bindings);
        });
    }
}
