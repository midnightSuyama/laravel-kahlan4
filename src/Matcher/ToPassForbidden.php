<?php

namespace LaravelKahlan4\Matcher;

class ToPassForbidden extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertForbidden().'
        );

        return static::assert(function() use ($response) {
            $response->assertForbidden();
        });
    }
}
