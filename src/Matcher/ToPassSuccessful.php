<?php

namespace LaravelKahlan4\Matcher;

class ToPassSuccessful extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSuccessful().'
        );

        return static::assert(function() use ($response) {
            $response->assertSuccessful();
        });
    }
}
