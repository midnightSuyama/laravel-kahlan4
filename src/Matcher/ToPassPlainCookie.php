<?php

namespace LaravelKahlan4\Matcher;

use Illuminate\Foundation\Testing\TestResponse;

class ToPassPlainCookie extends BaseMatcher
{
    static function match(TestResponse $response, $cookieName, $value=null)
    {
        static::buildDescription(
            'pass assertPlainCookie().',
            compact('cookieName', 'value')
        );

        return static::assert(function() use ($response, $cookieName, $value) {
            $response->assertPlainCookie($cookieName, $value);
        });
    }
}
