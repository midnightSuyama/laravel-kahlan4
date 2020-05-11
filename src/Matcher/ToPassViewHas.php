<?php

namespace LaravelKahlan4\Matcher;

class ToPassViewHas extends BaseMatcher
{
    static function match($response, $key, $value=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertViewHas().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertViewHas($key, $value);
        });
    }
}
