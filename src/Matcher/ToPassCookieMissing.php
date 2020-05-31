<?php

namespace LaravelKahlan4\Matcher;

class ToPassCookieMissing extends BaseMatcher
{
    static function match($response, $cookieName)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertCookieMissing().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieMissing($cookieName);
        });
    }
}
