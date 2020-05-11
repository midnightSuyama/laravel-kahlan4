<?php

namespace LaravelKahlan4\Matcher;

class ToPassUnauthorized extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertUnauthorized().'
        );

        return static::assert(function() use ($response) {
            $response->assertUnauthorized();
        });
    }
}
