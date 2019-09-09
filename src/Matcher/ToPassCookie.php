<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassCookie extends BaseMatcher
{
    static function match(TestResponse $response, $cookieName, $value=null, $encrypted=true, $unserialize=false)
    {
        static::buildDescription(
            'pass assertCookie().',
            compact('cookieName', 'value', 'encrypted', 'unserialize')
        );

        return static::assert(function() use ($response, $cookieName, $value, $encrypted, $unserialize) {
            $response->assertCookie($cookieName, $value, $encrypted, $unserialize);
        });
    }
}
