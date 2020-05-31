<?php

namespace LaravelKahlan4\Matcher;

class ToPassRedirect extends BaseMatcher
{
    static function match($response, $uri=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertRedirect().',
            compact('uri')
        );

        return static::assert(function() use ($response, $uri) {
            $response->assertRedirect($uri);
        });
    }
}
