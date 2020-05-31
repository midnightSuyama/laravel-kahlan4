<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHas extends BaseMatcher
{
    static function match($response, $key, $value=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHas().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertSessionHas($key, $value);
        });
    }
}
