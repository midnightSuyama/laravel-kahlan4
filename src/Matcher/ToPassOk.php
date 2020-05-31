<?php

namespace LaravelKahlan4\Matcher;

class ToPassOk extends BaseMatcher
{
    static function match($response)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertOk().'
        );

        return static::assert(function() use ($response) {
            $response->assertOk();
        });
    }
}
