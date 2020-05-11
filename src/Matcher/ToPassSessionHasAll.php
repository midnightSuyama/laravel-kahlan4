<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHasAll extends BaseMatcher
{
    static function match($response, array $bindings)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHasAll().',
            compact('bindings')
        );

        return static::assert(function() use ($response, $bindings) {
            $response->assertSessionHasAll($bindings);
        });
    }
}
