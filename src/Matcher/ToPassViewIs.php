<?php

namespace LaravelKahlan4\Matcher;

class ToPassViewIs extends BaseMatcher
{
    static function match($response, $value)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertViewIs().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertViewIs($value);
        });
    }
}
