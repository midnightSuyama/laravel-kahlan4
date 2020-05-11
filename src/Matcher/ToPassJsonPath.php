<?php

namespace LaravelKahlan4\Matcher;

class ToPassJsonPath extends BaseMatcher
{
    static function match($response, $path, $expect, $strict = false)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertJsonPath().',
            compact('path', 'expect', 'strict')
        );

        return static::assert(function() use ($response, $path, $expect, $strict) {
            $response->assertJsonPath($path, $expect, $strict);
        });
    }
}

