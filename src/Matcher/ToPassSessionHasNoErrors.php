<?php

namespace LaravelKahlan4\Matcher;

class ToPassSessionHasNoErrors extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertSessionHasNoErrors().'
        );

        return static::assert(function() use ($response) {
            $response->assertSessionHasNoErrors();
        });
    }
}
