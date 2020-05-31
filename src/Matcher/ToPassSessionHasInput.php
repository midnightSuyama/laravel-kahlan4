<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHasInput extends BaseMatcher
{
    static function match($response, $key, $value=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHasInput().',
            compact('key', 'value')
        );

        return static::assert(function() use ($response, $key, $value) {
            $response->assertSessionHasInput($key, $value);
        });
    }
}
