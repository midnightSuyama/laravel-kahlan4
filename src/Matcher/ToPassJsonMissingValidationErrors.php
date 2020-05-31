<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonMissingValidationErrors extends BaseMatcher
{
    static function match($response, $keys=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonMissingValidationErrors().',
            compact('keys')
        );

        return static::assert(function() use ($response, $keys) {
            $response->assertJsonMissingValidationErrors($keys);
        });
    }
}
