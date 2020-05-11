<?php

namespace LaravelKahlan4\Matcher;

class ToPassCreated extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertCreated().'
        );

        return static::assert(function() use ($response) {
            $response->assertCreated();
        });
    }
}

