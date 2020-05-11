<?php

namespace LaravelKahlan4\Matcher;

class ToPassCookieNotExpired extends BaseMatcher
{
    static function match($response, $cookieName)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertCookieNotExpired().',
            compact('cookieName')
        );

        return static::assert(function() use ($response, $cookieName) {
            $response->assertCookieNotExpired($cookieName);
        });
    }
}
