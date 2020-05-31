<?php

namespace LaravelKahlan4\Matcher;

class ToPassLocation extends BaseMatcher
{
    static function match($response, $uri)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertLocation().',
            compact('uri')
        );

        return static::assert(function() use ($response, $uri) {
            $response->assertLocation($uri);
        });
    }
}
