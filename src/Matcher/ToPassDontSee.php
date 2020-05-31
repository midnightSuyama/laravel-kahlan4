<?php

namespace LaravelKahlan4\Matcher;

class ToPassDontSee extends BaseMatcher
{
    static function match($response, $value)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertDontSee().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertDontSee($value);
        });
    }
}
