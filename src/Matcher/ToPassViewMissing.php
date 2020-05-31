<?php

namespace LaravelKahlan4\Matcher;

class ToPassViewMissing extends BaseMatcher
{
    static function match($response, $key)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertViewMissing().',
            compact('key')
        );

        return static::assert(function() use ($response, $key) {
            $response->assertViewMissing($key);
        });
    }
}
