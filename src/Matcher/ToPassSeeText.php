<?php

namespace LaravelKahlan4\Matcher;

class ToPassSeeText extends BaseMatcher
{
    static function match($response, $value)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'be passed assertSeeText().',
            compact('value')
        );

        return static::assert(function() use ($response, $value) {
            $response->assertSeeText($value);
        });
    }
}
