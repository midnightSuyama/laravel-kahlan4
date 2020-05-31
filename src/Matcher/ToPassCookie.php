<?php

namespace LaravelKahlan4\Matcher;

class ToPassCookie extends BaseMatcher
{
    static function match($response, $cookieName, $value=null, $encrypted=true, $unserialize=false)
    {
        static::ensureValidResponse($response);

        static::buildDescription(
            'pass assertCookie().',
            compact('cookieName', 'value', 'encrypted', 'unserialize')
        );

        return static::assert(function() use ($response, $cookieName, $value, $encrypted, $unserialize) {
            $response->assertCookie($cookieName, $value, $encrypted, $unserialize);
        });
    }
}
