<?php

namespace LaravelKahlan4\Matcher;

class ToPassCookieExpired extends BaseMatcher
{
    static function match($response, $cookieName)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertCookieExpired().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieExpired($cookieName);
        });
    }
}
