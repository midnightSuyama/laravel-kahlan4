<?php

namespace LaravelKahlan4\Matcher;

class ToPassNotFound extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertNotFound().'
        );

        return static::assert(function() use ($response) {
            $response->assertNotFound();
        });
    }
}
