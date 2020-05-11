<?php

namespace LaravelKahlan4\Matcher;

class ToPassDontSeeText extends BaseMatcher
{
    static function match($response, $value)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertDontSeeText().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertDontSeeText($value);
        });
    }
}
