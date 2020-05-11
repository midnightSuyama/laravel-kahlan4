<?php

namespace LaravelKahlan4\Matcher;

class ToPassSee extends BaseMatcher
{
    static function match($response, $value)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSee().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertSee($value);
        });
    }
}
