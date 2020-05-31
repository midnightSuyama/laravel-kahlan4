<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionMissing extends BaseMatcher
{
    static function match($response, $key)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionMissing().',
            compact('key')
        );

        return static::assert(function() use ($response, $key) {
            $response->assertSessionMissing($key);
        });
    }
}
