<?php

namespace LaravelKahlan4\Matcher;

class ToPassViewHasAll extends BaseMatcher
{
    static function match($response, array $bindings)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertViewHasAll().',
            compact('bindings')
        );

        return static::assert(function() use ($response, $bindings) {
            $response->assertViewHasAll($bindings);
        });
    }
}
