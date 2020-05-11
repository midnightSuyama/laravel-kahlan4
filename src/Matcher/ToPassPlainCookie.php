<?php

namespace LaravelKahlan4\Matcher;

class ToPassPlainCookie extends BaseMatcher
{
    static function match($response, $cookieName, $value=null)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertPlainCookie().',
            compact('cookieName', 'value')
        );

        return static::assert(function() use ($response, $cookieName, $value) {
            $response->assertPlainCookie($cookieName, $value);
        });
    }
}
